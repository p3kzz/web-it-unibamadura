<?php

namespace App\Services\Admin\Tentang\Sdm;

use App\Models\Pegawai;
use App\Models\StrukturOrganisasi;
use App\Models\UnitOrganisasi;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class PegawaiQueryService
{
    /**
     * Get data for index page.
     */
    public function getIndexData(?int $strukturId = null, ?int $unitId = null): array
    {
        // Get active struktur if not specified
        if (!$strukturId) {
            $activeStruktur = StrukturOrganisasi::where('is_active', true)->first();
            $strukturId = $activeStruktur?->id;
        }

        $strukturList = StrukturOrganisasi::with('periode')
            ->orderByDesc('is_active')
            ->orderByDesc('created_at')
            ->get();

        $selectedStruktur = $strukturId
            ? StrukturOrganisasi::with('periode')->find($strukturId)
            : null;

        $units = $selectedStruktur
            ? UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
            ->orderBy('type')
            ->orderBy('name')
            ->get()
            : collect();

        $pegawai = $this->getItems($strukturId, $unitId);

        return compact(
            'strukturList',
            'selectedStruktur',
            'strukturId',
            'units',
            'unitId',
            'pegawai'
        );
    }

    /**
     * Get paginated pegawai list with filters.
     */
    public function getItems(
        ?int $strukturId = null,
        ?int $unitId = null,
        ?string $search = null,
        ?string $status = null,
        int $perPage = 15
    ): Paginator {
        return Pegawai::query()
            ->with(['penugasan' => function ($q) {
                $q->aktif()->with('unitOrganisasi');
            }])
            ->when($strukturId, fn($q) => $q->byStruktur($strukturId))
            ->when($unitId, fn($q) => $q->byUnit($unitId))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sq) use ($search) {
                    $sq->where('nama', 'like', "%{$search}%")
                        ->orWhere('jabatan', 'like', "%{$search}%");
                });
            })
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('nama')
            ->simplePaginate($perPage);
    }

    /**
     * Find pegawai by ID with relations.
     */
    public function findById(int $id): Pegawai
    {
        return Pegawai::with([
            'penugasan.unitOrganisasi.struktur.periode'
        ])->findOrFail($id);
    }

    /**
     * Get all pegawai for a struktur grouped by unit.
     */
    public function getByStrukturGroupedByUnit(int $strukturId): Collection
    {
        return UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
            ->with(['pegawaiAktif' => fn($q) => $q->orderBy('nama')])
            ->whereNull('parent_id')
            ->with(['children.pegawaiAktif' => fn($q) => $q->orderBy('nama')])
            ->orderBy('name')
            ->get();
    }

    /**
     * Get units for dropdown (filtered by struktur).
     */
    public function getUnitsForDropdown(int $strukturId): Collection
    {
        return UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
            ->with('parent')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
    }

    /**
     * Get all available struktur organisasi for dropdown.
     */
    public function getStrukturList(): Collection
    {
        return StrukturOrganisasi::with('periode')
            ->orderByDesc('is_active')
            ->orderByDesc('created_at')
            ->get();
    }
}
