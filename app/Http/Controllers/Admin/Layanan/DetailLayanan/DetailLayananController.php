<?php

namespace App\Http\Controllers\Admin\Layanan\DetailLayanan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\DetailLayanan\StoreDetailLayananRequest;
use App\Http\Requests\Admin\Layanan\DetailLayanan\UpdateDetaillayananRequest;
use App\Models\DetailKatalogLayanan;
use App\Services\Admin\Layanan\DetailLayanan\DetailLayananQueryService;
use App\Services\Admin\Layanan\DetailLayanan\DetailLayananService;
use Illuminate\Http\Request;

class DetailLayananController extends Controller
{
    public function __construct(
        protected DetailLayananService $service,
        protected DetailLayananQueryService $queryService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $katalogLayananId = $request->get('katalog_layanan_id');

        $filters = [
            'search' => $search,
            'katalog_layanan_id' => $katalogLayananId,
        ];

        $items = $this->queryService->getItems($filters);
        $katalogList = $this->queryService->getKatalogList();
        $selectedKatalog = $this->queryService->getSelectedKatalog($katalogLayananId);

        if ($request->ajax()) {
            return view('admin.pages.layanan.detail-layanan.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.layanan.detail-layanan.index', compact('items', 'search', 'katalogList', 'katalogLayananId', 'selectedKatalog'));
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
    public function store(StoreDetailLayananRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('admin.layanan.detail-layanan.index')
            ->with('success', 'Detail Layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(UpdateDetaillayananRequest $request, DetailKatalogLayanan $detail_layanan)
    {
        $this->service->update($detail_layanan, $request->validated());

        return redirect()->route('admin.layanan.detail-layanan.index')
            ->with('success', 'Detail Layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailKatalogLayanan $detail_layanan)
    {
        $detail_layanan->delete();

        return redirect()->route('admin.layanan.detail-layanan.index')
            ->with('success', 'Detail Layanan berhasil dihapus.');
    }
}
