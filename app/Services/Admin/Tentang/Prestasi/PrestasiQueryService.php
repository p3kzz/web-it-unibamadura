<?php

namespace App\Services\Admin\Tentang\Prestasi;

use App\Models\Prestasi;

class PrestasiQueryService
{
    public function getItems(array $filters)
    {
        return Prestasi::query()
            ->when($filters['year'], function ($q) use ($filters) {
                $q->where('year', $filters['year']);
            })
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('organization', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest('achievement_date')
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getYears()
    {
        return Prestasi::selectRaw('DISTINCT year')
            ->orderBy('year', 'desc')
            ->pluck('year');
    }
}
