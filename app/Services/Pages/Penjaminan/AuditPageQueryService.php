<?php

namespace App\Services\Pages\Penjaminan;

use App\Models\Audit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AuditPageQueryService
{
    /**
     * Create a new class instance.
     */
    public function getPaginatedActive(int $perPage = 9): LengthAwarePaginator
    {
        return Audit::query()
            ->where('is_active', true)
            ->withCount('sections')
            ->latest('id')
            ->paginate($perPage);
    }

    public function getPublishedDetailOrFail(string $identifier): Audit
    {
        return Audit::query()
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

    public function getRelatedActive(Audit $hosting, int $limit = 3): Collection
    {
        return Audit::query()
            ->where('is_active', true)
            ->where('id', '!=', $hosting->id)
            ->withCount('sections')
            ->latest('id')
            ->take($limit)
            ->get();
    }
}
