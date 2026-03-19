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
            ->with(['periode', 'unitOrganisasi'])
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
     * Get active struktur organisasi with units.
     */
    public function getActive()
    {
        return StrukturOrganisasi::query()
            ->with([
                'periode',
                'directorates.subdirectorates' => fn($q) => $q->orderBy('order'),
            ])
            ->active()
            ->first();
    }

    /**
     * Find struktur organisasi by id.
     */
    public function findById(int $id)
    {
        return StrukturOrganisasi::with(['periode', 'unitOrganisasi'])
            ->findOrFail($id);
    }
}
