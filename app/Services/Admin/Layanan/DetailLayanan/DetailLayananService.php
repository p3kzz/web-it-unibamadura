<?php

namespace App\Services\Admin\Layanan\DetailLayanan;

use App\Models\DetailKatalogLayanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DetailLayananService
{
    /**
     * Create a new class instance.
     */

    public function store(array $data): DetailKatalogLayanan
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);
            $data['content'] = $data['sections'] ?? [];
            unset($data['sections']);

            $hosting = DetailKatalogLayanan::create($data);

            return $hosting;
        });
    }

    public function update(DetailKatalogLayanan $detailLayanan, array $data): DetailKatalogLayanan
    {
        return DB::transaction(function () use ($detailLayanan, $data) {
            if (isset($data['title']) && $data['title'] !== $detailLayanan->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $detailLayanan->id);
            }

            if (isset($data['sections'])) {
                $data['content'] = $data['sections'];
                unset($data['sections']);
            }

            $detailLayanan->update($data);
            return $detailLayanan;
        });
    }

    public function delete(DetailKatalogLayanan $detailLayanan): void
    {
        $detailLayanan->delete();
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $baseSlug = $slug;
        $counter = 1;

        while (
            DetailKatalogLayanan::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
