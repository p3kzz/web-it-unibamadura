<?php

namespace App\Services\Pages\Penjaminan;

use App\Models\TinjauanManajemen;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TinjauanManajemenPageQueryService
{
    /**
     * Create a new class instance.
     */
   public function getPaginatedActive(int $perPage = 9): LengthAwarePaginator
    {
        return TinjauanManajemen::query()
            ->where('is_active', true)
            ->withCount('sections')
            ->latest('id')
            ->paginate($perPage);
    }

    public function getPublishedDetailOrFail(string $identifier): TinjauanManajemen
    {
        return TinjauanManajemen::query()
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

    public function getRelatedActive(TinjauanManajemen $hosting, int $limit = 3): Collection
    {
        return TinjauanManajemen::query()
            ->where('is_active', true)
            ->where('id', '!=', $hosting->id)
            ->withCount('sections')
            ->latest('id')
            ->take($limit)
            ->get();
    }
}
