<?php

namespace App\Services\Admin\Content;

use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): Content
    {
        return DB::transaction(function () use ($data) {
            if (isset($data['thumbnail'])) {
                $data['thumbnail'] = $data['thumbnail']
                    ->store('berita', 'public');
            }

            $data['slug'] = $this->generateUniqueSlug($data['title']);
            if ($data['status'] === 'published') {
                $data['published_at'] = $data['published_at'] ?? now();
            } else {
                $data['published_at'] = null;
            }
            $data['user_id'] = $data['user_id'] ?? Auth::id();
            return Content::create($data);
        });
    }

    public function update(Content $content, array $data): Content
    {
        return DB::transaction(function () use ($content, $data) {
            if (isset($data['thumbnail'])) {

                if ($content->thumbnail && Storage::disk('public')->exists($content->thumbnail)) {
                    Storage::disk('public')->delete($content->thumbnail);
                }

                $data['thumbnail'] = $data['thumbnail']
                    ->store('content', 'public');
            }

            if (isset($data['title']) && $data['title'] !== $content->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $content->id);
            }

            $status = $data['status'] ?? $content->status;

            if ($status === 'published') {

                if (!$content->published_at) {
                    $data['published_at'] = now();
                }
            } else {
                $data['published_at'] = null;
            }

            $content->update($data);

            return $content->refresh();
        });
    }

    public function incrementViews(Content $content): void
    {
        $content->increment('views');
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;

        $count = 1;

        while (
            Content::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
