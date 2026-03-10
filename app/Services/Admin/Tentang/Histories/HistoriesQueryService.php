<?php

namespace App\Services\Admin\Tentang\Histories;

use App\Models\Histories;

class HistoriesQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return Histories::query()
            ->where('type', $filters['type'])

            ->when(
                $filters['is_active'] !== null,
                fn($q) =>
                $q->where('is_active', $filters['is_active'])
            )

            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%")
                        ->orWhere('sub_title', 'like', "%{$search}%");
                });
            })

            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
