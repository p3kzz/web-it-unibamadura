<?php

namespace App\Services\Admin\Penjaminan\TinjauanManajemen;

use App\Models\TinjauanManajemen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TinjauanManajemenService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): TinjauanManajemen
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);

            $tinjauan = TinjauanManajemen::create($data);
            $this->syncSections($tinjauan, $data['sections']);

            return $tinjauan;
        });
    }

    public function update(TinjauanManajemen $tinjauan, array $data): TinjauanManajemen
    {
        return DB::transaction(function () use ($tinjauan, $data) {
            if (isset($data['title']) && $data['title'] !== $tinjauan->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $tinjauan->id);
            }

            $tinjauan->update($data);

            if (isset($data['sections'])) {
                $tinjauan->sections()->delete();
                $this->syncSections($tinjauan, $data['sections']);
            }

            return $tinjauan;
        });
    }

    public function delete(TinjauanManajemen $tinjauan): void
    {
        $tinjauan->delete();
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $baseSlug = $slug;
        $counter = 1;

        while (
            TinjauanManajemen::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    private function syncSections(TinjauanManajemen $tinjauan, array $sections): void
    {
        foreach ($sections as $sectionData) {
            $tinjauan->sections()->create([
                'title' => $sectionData['title'],
                'content' => $sectionData['content'],
            ]);
        }
    }
}
