<?php

namespace App\Services\Admin\Tentang\UnitOrganisasi;

use App\Models\UnitOrganisasi;

class UnitOrganisasiQueryService
{
    /**
     * Get all units by struktur organisasi id.
     */
    public function getByStrukturId(int $strukturId, ?string $search = null)
    {
        return UnitOrganisasi::query()
            ->where('struktur_organisasi_id', $strukturId)
            ->when($search, function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->get();
    }

    /**
     * Get directorates only by struktur organisasi id.
     */
    public function getDirectoratesByStrukturId(int $strukturId)
    {
        return UnitOrganisasi::query()
            ->where('struktur_organisasi_id', $strukturId)
            ->directorates()
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();
    }

    /**
     * Get unit tree (directorates with subdirectorates).
     */
    public function getUnitTree(int $strukturId)
    {
        return UnitOrganisasi::query()
            ->where('struktur_organisasi_id', $strukturId)
            ->whereNull('parent_id')
            ->with('childrenRecursive')
            ->orderBy('order')
            ->get();
    }


    /**
     * Find unit by id.
     */
    public function findById(int $id)
    {
        return UnitOrganisasi::with(['parent', 'childrenRecursive'])
            ->findOrFail($id);
    }
}
