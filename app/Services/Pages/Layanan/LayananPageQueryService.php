<?php

namespace App\Services\Pages\Layanan;

use App\Models\KategoriLayanan;
use App\Models\KatalogLayanan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LayananPageQueryService
{
    public function getKatalogLayanan(int $limit = 6): Collection
    {
        return KatalogLayanan::query()
            ->where('is_active', true)
            ->latest('id')
            ->take($limit)
            ->get();
    }

    public function getPaginatedKatalog(int $perPage = 6): LengthAwarePaginator
    {
        return KatalogLayanan::query()
            ->where('is_active', true)
            ->latest('id')
            ->paginate($perPage);
    }

    public function getPublishedDetailOrFail(KatalogLayanan $katalogLayanan): KatalogLayanan
    {
        if (!$katalogLayanan->is_active) {
            abort(404);
        }

        return $katalogLayanan;
    }

    // public function getRelatedKatalog(KatalogLayanan $katalogLayanan, int $limit = 3): Collection
    // {
    //     return KatalogLayanan::query()
    //         ->where('is_active', true)
    //         ->where('id', '!=', $katalogLayanan->id)
    //         ->when(
    //             $katalogLayanan->kategori_layanan_id,
    //             fn($q) => $q->where('kategori_layanan_id', $katalogLayanan->kategori_layanan_id)
    //         )
    //         ->latest('id')
    //         ->take($limit)
    //         ->get();
    // }
}
