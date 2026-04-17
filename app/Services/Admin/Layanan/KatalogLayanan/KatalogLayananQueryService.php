<?php

namespace App\Services\Admin\Layanan\KatalogLayanan;

use App\Models\KatalogLayanan;
use App\Models\KategoriLayanan;

class KatalogLayananQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return KatalogLayanan::query()
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('nama', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%")
                        ->orWhere('service_owner', 'like', "%{$search}%");
                });
            })

            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
