<?php

namespace App\Services\Pages\Layanan;

use App\Models\SoftwareLicenses;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class LicensesSoftwarePageQueryService
{
    public function getPaginatedActive(int $perPage = 9): LengthAwarePaginator
    {
        return SoftwareLicenses::query()
            ->where('is_active', true)
            ->withCount('sections')
            ->latest('id')
            ->paginate($perPage);
    }

    public function getPublishedDetailOrFail(string $identifier): SoftwareLicenses
    {
        return SoftwareLicenses::query()
            ->where('is_active', true)
            ->where(function ($query) use ($identifier) {
                $query->where('slug', $identifier);

                if (is_numeric($identifier)) {
                    $query->orWhere('id', (int) $identifier);
                }
            })
            ->with(['sections.contents'])
            ->firstOrFail();
    }

    public function getRelatedActive(SoftwareLicenses $license, int $limit = 3): Collection
    {
        return SoftwareLicenses::query()
            ->where('is_active', true)
            ->where('id', '!=', $license->id)
            ->withCount('sections')
            ->latest('id')
            ->take($limit)
            ->get();
    }
}
