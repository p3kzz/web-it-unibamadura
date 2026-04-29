<?php

namespace App\Services\Pages\Layanan;

use App\Models\KatalogLayanan;
use App\Models\DetailKatalogLayanan;
use Illuminate\Database\Eloquent\Collection;

class DetailLayananPageQuery
{
    public function getNavKatalogLayanan(): Collection
    {
        return KatalogLayanan::query()
            ->where('is_active', true)
            ->orderBy('nama')
            ->get(['id', 'nama']);
    }

    public function getDetailKatalogOrFail(int $katalogLayananId): KatalogLayanan
    {
        return KatalogLayanan::query()
            ->where('is_active', true)
            ->findOrFail($katalogLayananId);
    }

    public function getDetailItemsByKatalog(int $katalogLayananId): Collection
    {
        return DetailKatalogLayanan::query()
            ->where('katalog_layanan_id', $katalogLayananId)
            ->orderBy('title')
            ->get();
    }

    public function getDetailBySlug(string $slug): ?DetailKatalogLayanan
    {
        return DetailKatalogLayanan::query()
            ->where('slug', $slug)
            ->first();
    }
}
