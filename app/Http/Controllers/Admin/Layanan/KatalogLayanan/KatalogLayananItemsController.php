<?php

namespace App\Http\Controllers\Admin\Layanan\KatalogLayanan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\StoreKatalogLayananRequest;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\UpdateKatalogLayananRequest;
use App\Models\KatalogLayanan;
use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananQueryService;
use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananService;
use Illuminate\Http\Request;

class KatalogLayananItemsController extends Controller
{
    public function __construct(private KatalogLayananQueryService $query, private KatalogLayananService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = [
            'search' => $search,
        ];

        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.layanan.katalog-layanan.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.layanan.katalog-layanan.index', compact('items', 'search'));
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
    public function store(StoreKatalogLayananRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->back()->with('success', 'Katalog layanan berhasil ditambahkan.');
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
    public function update(UpdateKatalogLayananRequest $request, KatalogLayanan $katalog_layanan)
    {
        $this->service->update($katalog_layanan, $request->validated());

        return redirect()->back()->with('success', 'Katalog layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KatalogLayanan $katalog_layanan)
    {
        $katalog_layanan->delete();
        return redirect()->back()->with('success', 'Katalog layanan berhasil dihapus.');
    }
}
