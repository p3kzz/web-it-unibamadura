<?php

namespace App\Http\Controllers\Admin\Tentang\StrukturOrganisasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\StrukturOrganisasi\StoreStrukturRequest;
use App\Http\Requests\Admin\Tentang\StrukturOrganisasi\UpdateStrukturRequest;
use App\Models\Periode;
use App\Models\StrukturOrganisasi;
use App\Models\UnitOrganisasi;
use App\Services\Admin\Tentang\StrukturOrganisasi\StrukturOrganisasiQueryService;
use App\Services\Admin\Tentang\StrukturOrganisasi\StrukturOrganisasiService;
use Illuminate\Http\Request;

class StrukturOrganisasiItemsController extends Controller
{
    public function __construct(
        private StrukturOrganisasiService $service,
        private StrukturOrganisasiQueryService $query
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $strukturId = $request->get('struktur_id');

        $strukturList = $this->query->getItems($search, 100); // reuse
        $periodes = Periode::orderBy('start_year', 'desc')->get();

        $selectedStruktur = null;
        $units = collect();
        $directorates = collect();

        if ($strukturId) {
            $selectedStruktur = $this->query->findById($strukturId);

            $units = app(\App\Services\Admin\Tentang\UnitOrganisasi\UnitOrganisasiQueryService::class)
                ->getUnitTree($strukturId);

            $directorates = app(\App\Services\Admin\Tentang\UnitOrganisasi\UnitOrganisasiQueryService::class)
                ->getDirectoratesByStrukturId($strukturId);
        }

        $view = $request->ajax()
            ? 'admin.pages.tentang.struktur-organisasi.partials.content'
            : 'admin.pages.tentang.struktur-organisasi.index';

        return view($view, compact(
            'strukturList',
            'periodes',
            'selectedStruktur',
            'units',
            'directorates',
            'search'
        ));
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
    public function store(StoreStrukturRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Struktur organisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $struktur_organisasi_item)
    {
        $struktur = $this->query->findById($struktur_organisasi_item->id);

        return view('admin.pages.tentang.struktur-organisasi.show', compact('struktur'));
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
    public function update(UpdateStrukturRequest $request, StrukturOrganisasi $struktur_organisasi_item)
    {
        $this->service->update($struktur_organisasi_item, $request->validated());

        return back()->with('success', 'Struktur organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganisasi $struktur_organisasi_item)
    {
        $this->service->delete($struktur_organisasi_item);

        return back()->with('success', 'Struktur organisasi berhasil dihapus.');
    }
}
