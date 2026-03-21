<?php

namespace App\Services\Admin\Tentang\StrukturOrganisasi;

use App\Models\Periode;
use App\Models\StrukturOrganisasi;
use App\Services\Admin\Tentang\UnitOrganisasi\UnitOrganisasiQueryService;

class StrukturOrganisasiQueryService
{
    public function __construct(
        private UnitOrganisasiQueryService $unitQuery
    ) {}

    /**
     * Get all data needed for index page.
     */
    public function getIndexData(?int $strukturId = null): array
    {
        $strukturList = $this->getItems(null, 100);
        $periodes = $this->getAllPeriodes();
        $availablePeriodes = $this->getAvailablePeriodes();

        $selectedStruktur = null;
        $units = collect();
        $directorates = collect();

        if ($strukturId) {
            $selectedStruktur = $this->findById($strukturId);
            $units = $this->unitQuery->getUnitTree($strukturId);
            $directorates = $this->unitQuery->getDirectoratesByStrukturId($strukturId);
        }

        return compact(
            'strukturList',
            'periodes',
            'availablePeriodes',
            'selectedStruktur',
            'units',
            'directorates'
        );
    }

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
     * Get all periodes ordered by start_year desc.
     */
    public function getAllPeriodes()
    {
        return Periode::orderBy('start_year', 'desc')->get();
    }

    /**
     * Get available periodes (not used by any struktur).
     */
    public function getAvailablePeriodes()
    {
        $usedPeriodeIds = StrukturOrganisasi::pluck('periode_id')->toArray();

        return Periode::whereNotIn('id', $usedPeriodeIds)
            ->orderBy('start_year', 'desc')
            ->get();
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
