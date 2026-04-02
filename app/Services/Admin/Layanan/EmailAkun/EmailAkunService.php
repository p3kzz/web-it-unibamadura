<?php

namespace App\Services\Admin\Layanan\EmailAkun;

use App\Models\EmailAkun;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailAkunService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): EmailAkun
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);

            $hosting = EmailAkun::create($data);
            $this->syncSections($hosting, $data['sections']);

            return $hosting;
        });
    }

    public function update(EmailAkun $hosting, array $data): EmailAkun
    {
        return DB::transaction(function () use ($hosting, $data) {
            if (isset($data['title']) && $data['title'] !== $hosting->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $hosting->id);
            }

            $hosting->update($data);

            if (isset($data['sections'])) {
                $hosting->sections()->delete();
                $this->syncSections($hosting, $data['sections']);
            }

            return $hosting;
        });
    }

    public function delete(EmailAkun $hosting): void
    {
        $hosting->delete();
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $baseSlug = $slug;
        $counter = 1;

        while (
            EmailAkun::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    private function syncSections(EmailAkun $hosting, array $sections): void
    {
        foreach ($sections as $sectionData) {
            $hosting->sections()->create([
                'title' => $sectionData['title'],
                'content' => $sectionData['content'],
            ]);
        }
    }
}
