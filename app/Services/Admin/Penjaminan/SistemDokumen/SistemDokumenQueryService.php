<?php

namespace App\Services\Admin\Penjaminan\SistemDokumen;

use App\Models\SistemDokumenItem;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class SistemDokumenQueryService
{
    public function getItems(array $filters): Paginator
    {
        return SistemDokumenItem::query()
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
        return SistemDokumenItem::query()
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function findById(int $id): ?SistemDokumenItem
    {
        return SistemDokumenItem::find($id);
    }
}
