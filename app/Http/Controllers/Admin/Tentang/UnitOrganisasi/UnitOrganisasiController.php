<?php

namespace App\Http\Controllers\Admin\Tentang\UnitOrganisasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\UnitOrganisasi\StoreUnitOrganisasiRequest;
use App\Http\Requests\Admin\Tentang\UnitOrganisasi\UpdateUnitOrganisasiRequest;
use App\Models\StrukturOrganisasi;
use App\Models\UnitOrganisasi;
use App\Services\Admin\Tentang\UnitOrganisasi\UnitOrganisasiQueryService;
use App\Services\Admin\Tentang\UnitOrganisasi\UnitOrganisasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitOrganisasiController extends Controller
{
    public function __construct(
        private UnitOrganisasiService $service,
        private UnitOrganisasiQueryService $query
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, StrukturOrganisasi $struktur)
    {
        $units = $this->query->getUnitTree($struktur->id);
        $directorates = $this->query->getDirectoratesByStrukturId($struktur->id);

        $view = $request->ajax()
            ? 'admin.pages.tentang.struktur-organisasi.unit.partials.table'
            : 'admin.pages.tentang.struktur-organisasi.unit.index';

        return view($view, compact('units', 'struktur', 'directorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitOrganisasiRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Unit organisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitOrganisasi $unit)
    {
        $unit = $this->query->findById($unit->id);

        return view('admin.pages.tentang.struktur-organisasi.unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitOrganisasiRequest $request, UnitOrganisasi $unit)
    {
        $this->service->update($unit, $request->validated());

        return back()->with('success', 'Unit organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitOrganisasi $unit)
    {
        $this->service->delete($unit);

        return back()->with('success', 'Unit organisasi berhasil dihapus.');
    }

    /**
     * Update the order of units.
     */
    public function updateOrder(array $orderedIds): void
    {
        DB::transaction(function () use ($orderedIds) {
            foreach ($orderedIds as $index => $id) {
                UnitOrganisasi::where('id', $id)
                    ->update(['order' => $index + 1]);
            }
        });
    }
}
