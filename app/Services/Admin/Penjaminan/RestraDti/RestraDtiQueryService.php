<?php

namespace App\Services\Admin\Penjaminan\RestraDti;

use App\Models\RestraDti;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class RestraDtiQueryService
{
    /**
     * Create a new class instance.
     */
     public function getItems(array $filters): Paginator
    {
        return RestraDti::query()
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('judul', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getActive(int $limit = null): Collection
    {
        return RestraDti::query()
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function findById(int $id): ?RestraDti
    {
        return RestraDti::find($id);
    }
}
