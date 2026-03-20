<?php

namespace App\Services\Admin\Tentang\StrukturOrganisasi;

use App\Models\StrukturOrganisasi;

class StrukturOrganisasiQueryService
{
    /**
     * Get all struktur organisasi with filters.
     */
    public function getItems(?string $search = null, int $perPage = 10)
    {
        return StrukturOrganisasi::query()
            ->with(['periode'])
            ->withCount('units') 
            ->when($search, function ($q) use ($search) {
                $q->whereHas('periode', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate($perPage)
            ->withQueryString();
    }

    /**
     * Get active struktur organisasi with full tree.
     */
    public function getActive()
    {
        return StrukturOrganisasi::query()
            ->with([
                'periode',
                'roots.childrenRecursive',
            ])
            ->active()
            ->first();
    }

    /**
     * Find struktur organisasi by id with full tree.
     */
    public function findById(int $id)
    {
        return StrukturOrganisasi::with([
            'periode',
            'roots.childrenRecursive',
        ])->findOrFail($id);
    }
}
