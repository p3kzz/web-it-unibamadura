<?php

namespace App\Services\Admin\Penjaminan\Audit;

use App\Models\Audit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuditService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): Audit
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);

            $audit = Audit::create($data);
            $this->syncSections($audit, $data['sections']);

            return $audit;
        });
    }

    public function update(Audit $audit, array $data): Audit
    {
        return DB::transaction(function () use ($audit, $data) {
            if (isset($data['title']) && $data['title'] !== $audit->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $audit->id);
            }

            $audit->update($data);

            if (isset($data['sections'])) {
                $audit->sections()->delete();
                $this->syncSections($audit, $data['sections']);
            }

            return $audit;
        });
    }

    public function delete(Audit $audit): void
    {
        $audit->delete();
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $baseSlug = $slug;
        $counter = 1;

        while (
            Audit::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    private function syncSections(Audit $audit, array $sections): void
    {
        foreach ($sections as $sectionData) {
            $audit->sections()->create([
                'title' => $sectionData['title'],
                'content' => $sectionData['content'],
            ]);
        }
    }
}
