<?php

namespace App\Http\Controllers\Admin\Tentang\StrukturOrganisasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\StrukturOrganisasi\StoreStrukturRequest;
use App\Http\Requests\Admin\Tentang\StrukturOrganisasi\UpdateStrukturRequest;
use App\Models\StrukturOrganisasi;
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
        $data = $this->query->getIndexData($request->get('struktur_id'));

        $view = $request->ajax()
            ? 'admin.pages.tentang.struktur-organisasi.partials.content'
            : 'admin.pages.tentang.struktur-organisasi.index';

        return view($view, $data);
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
