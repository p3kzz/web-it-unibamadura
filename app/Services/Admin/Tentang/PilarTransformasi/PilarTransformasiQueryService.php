<?php

namespace App\Services\Admin\Tentang\PilarTransformasi;

use App\Models\Periode;
use App\Models\PilarTransformasi;

class PilarTransformasiQueryService
{
    public function getItems(array $filters)
    {
        return PilarTransformasi::query()
            ->when($filters['periode_id'], function ($q) use ($filters) {
                $q->where('periode_id', $filters['periode_id']);
            })
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where(function ($sub) use ($search) {
                    $sub->where('kode', 'like', "%{$search}%")
                        ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('subtitle', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->with('periode')
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getPeriodes()
    {
        return Periode::latest()->get();
    }
}
