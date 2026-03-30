<?php

namespace App\Services\Pages\Layanan;

use App\Models\WebHosting;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class WebHostingPageQueryService
{
    public function getPaginatedActive(int $perPage = 9): LengthAwarePaginator
    {
        return WebHosting::query()
            ->where('is_active', true)
            ->withCount('sections')
            ->latest('id')
            ->paginate($perPage);
    }

    public function getPublishedDetailOrFail(string $identifier): WebHosting
    {
        return WebHosting::query()
            ->where('is_active', true)
            ->where(function ($query) use ($identifier) {
                $query->where('slug', $identifier);

                if (is_numeric($identifier)) {
                    $query->orWhere('id', (int) $identifier);
                }
            })
            ->with('sections')
            ->firstOrFail();
    }

    public function getRelatedActive(WebHosting $hosting, int $limit = 3): Collection
    {
        return WebHosting::query()
            ->where('is_active', true)
            ->where('id', '!=', $hosting->id)
            ->withCount('sections')
            ->latest('id')
            ->take($limit)
            ->get();
    }
}
