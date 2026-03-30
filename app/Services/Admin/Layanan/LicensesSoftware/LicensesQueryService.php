<?php

namespace App\Services\Admin\Layanan\LicensesSoftware;

use App\Models\SoftwareLicenses;

class LicensesQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return SoftwareLicenses::query()
            ->with('sections.contents')
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getBySlug(string $slug): SoftwareLicenses
    {
        return SoftwareLicenses::with('sections.contents')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
