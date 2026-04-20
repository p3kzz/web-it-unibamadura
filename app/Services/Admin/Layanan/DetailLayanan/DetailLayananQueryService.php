<?php

namespace App\Services\Admin\Layanan\DetailLayanan;

use App\Models\DetailKatalogLayanan;
use App\Models\KatalogLayanan;

class DetailLayananQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return DetailKatalogLayanan::query()
            ->when($filters['katalog_layanan_id'], function ($q) use ($filters) {
                $q->where('katalog_layanan_id', $filters['katalog_layanan_id']);
            })
            ->when($filters['search'] ?? null, function ($query) use ($filters) {
                $search = $filters['search'];

                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getBySlug(string $slug): DetailKatalogLayanan
    {
        return DetailKatalogLayanan::query()
            ->with('katalog_layanan_id')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getKatalogList()
    {
        return KatalogLayanan::query()
            ->select(['id', 'nama'])
            ->orderBy('nama')
            ->get();
    }

    public function getSelectedKatalog($katalogLayananId)
    {
        if (!$katalogLayananId) {
            return null;
        }

        return KatalogLayanan::query()
            ->select(['id', 'nama'])
            ->find($katalogLayananId);
    }
}
