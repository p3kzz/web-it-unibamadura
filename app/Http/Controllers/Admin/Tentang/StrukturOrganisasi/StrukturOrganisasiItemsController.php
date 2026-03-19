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

        // Get all struktur for dropdown
        $strukturList = StrukturOrganisasi::with('periode')->latest()->get();
        $periodes = Periode::orderBy('start_year', 'desc')->get();

        // Get selected struktur and its units
        $selectedStruktur = null;
        $units = collect();
        $directorates = collect();

        if ($strukturId) {
            $selectedStruktur = StrukturOrganisasi::with('periode')->find($strukturId);

            if ($selectedStruktur) {
                // Get units as tree (directorates with subdirectorates)
                $units = UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
                    ->whereNull('parent_id')
                    ->with(['children' => fn($q) => $q->orderBy('order')])
                    ->orderBy('order')
                    ->get();

                // Get directorates for parent dropdown in forms
                $directorates = UnitOrganisasi::where('struktur_organisasi_id', $strukturId)
                    ->where('type', 'directorate')
                    ->orderBy('order')
                    ->get();
            }
        }

        if ($request->ajax()) {
            return view('admin.pages.tentang.struktur-organisasi.partials.content', compact(
                'selectedStruktur',
                'units',
                'directorates',
                'search'
            ));
        }

        return view('admin.pages.tentang.struktur-organisasi.index', compact(
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
