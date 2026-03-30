<?php

namespace App\Services\Admin\Layanan\LicensesSoftware;

use App\Models\SoftwareLicenses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LicensesService
{
    /**
     * Create a new class instance.
     */

    public function store(array $data): SoftwareLicenses
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);

            $license = SoftwareLicenses::create($data);
            $this->syncSections($license, $data['sections']);

            return $license;
        });
    }

    public function update(SoftwareLicenses $license, array $data): SoftwareLicenses
    {
        return DB::transaction(function () use ($license, $data) {
            if (isset($data['name']) && $data['name'] !== $license->name) {
                $data['slug'] = $this->generateUniqueSlug($data['name'], $license->id);
            }

            $license->update($data);

            if (isset($data['sections'])) {
                $license->sections()->delete();
                $this->syncSections($license, $data['sections']);
            }

            return $license;
        });
    }

    public function delete(SoftwareLicenses $license): void
    {
        $license->delete();
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;

        $count = 1;

        while (
            SoftwareLicenses::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }


        return $slug;
    }

    private function syncSections(SoftwareLicenses $license, array $sections): void
    {
        foreach ($sections as $sectionData) {

            $section = $license->sections()->create([
                'title' => $sectionData['title'],
            ]);

            $section->contents()->create([
                'content' => $sectionData['content'],
            ]);
        }
    }
}
