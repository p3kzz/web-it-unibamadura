<?php

namespace App\Services\Admin\Tentang\ProgramKerja;

use App\Models\Periode;
use App\Models\PilarTransformasi;
use App\Models\ProgramKerja;

class ProgramKerjaQueryService
{
    public function getItems(array $filters)
    {
        return ProgramKerja::query()
            ->when($filters['periode_id'], function ($q) use ($filters) {
                $q->where('periode_id', $filters['periode_id']);
            })
            ->when($filters['pilar_id'], function ($q) use ($filters) {
                $q->where('pilar_id', $filters['pilar_id']);
            })
            ->when($filters['status'], function ($q) use ($filters) {
                $q->where('status', $filters['status']);
            })
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where(function ($sub) use ($search) {
                    $sub->where('kode', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('tujuan', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%");
                });
            })
            ->with(['periode', 'pilar'])
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getPeriodes()
    {
        return Periode::latest()->get();
    }

    public function getPilars(?int $periodeId = null)
    {
        return PilarTransformasi::query()
            ->when($periodeId, function ($q) use ($periodeId) {
                $q->where('periode_id', $periodeId);
            })
            ->active()
            ->get();
    }
}
