<?php

namespace App\Services\Admin\Periode;

use App\Models\Periode;

class PeriodeQueryService
{
    /**
     * Create a new class instance.
     */
    public function handle(?string $search = null, int $perPage = 10)
    {
        return Periode::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('start_year', 'like', "%{$search}%")
                        ->orWhere('end_year', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate($perPage)
            ->withQueryString();
    }
}
