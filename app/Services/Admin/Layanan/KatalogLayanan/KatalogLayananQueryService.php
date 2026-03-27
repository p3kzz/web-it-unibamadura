<?php

namespace App\Services\Admin\Layanan\KatalogLayanan;

use App\Models\KatalogLayanan;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class KatalogLayananQueryService
{
    public function getItems(array $filters): Paginator
    {
        return KatalogLayanan::query()
            ->with('kategori')
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->when(isset($filters['is_active']) && $filters['is_active'] !== '', function ($q) use ($filters) {
                $q->where('is_active', (bool) $filters['is_active']);
            })
            ->orderBy('sort_order')
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getActive(?int $limit = null): Collection
    {
        return KatalogLayanan::query()
            ->with('kategori')
            ->active()
            ->orderBy('sort_order')
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function getGroupedByCategory(): Collection
    {
        return \App\Models\KategoriLayanan::query()
            ->with(['katalogLayanan' => fn($q) => $q->active()->orderBy('sort_order')])
            ->active()
            ->orderBy('sort_order')
            ->get();
    }

    public function findById(int $id): ?KatalogLayanan
    {
        return KatalogLayanan::find($id);
    }
}

