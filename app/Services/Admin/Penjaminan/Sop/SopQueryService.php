<?php

namespace App\Services\Admin\Penjaminan\Sop;

use App\Models\SopItem;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class SopQueryService
{
    public function getItems(array $filters): Paginator
    {
        return SopItem::query()
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
        return SopItem::query()
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function findById(int $id): ?SopItem
    {
        return SopItem::find($id);
    }
}
