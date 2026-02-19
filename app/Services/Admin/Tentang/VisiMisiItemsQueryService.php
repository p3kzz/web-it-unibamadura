<?php

namespace App\Services\Admin\Tentang;

use App\Models\Periode;
use App\Models\VisiMisiItem;

class VisiMisiItemsQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return VisiMisiItem::query()
            ->where('section', $filters['section'])

            ->when($filters['periode_id'], function ($q) use ($filters) {
                $q->where('periode_id', $filters['periode_id']);
            })

            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })

            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getPeriodes()
    {
        return Periode::latest()->get();
    }
}
