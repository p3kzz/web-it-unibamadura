<?php

namespace App\Services\Admin\Layanan\KategoriLayanan;

use App\Models\KategoriLayanan;

class KategoriLayananQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return KategoriLayanan::query()
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where(function ($sub) use ($search) {
                    $sub->where('nama', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
