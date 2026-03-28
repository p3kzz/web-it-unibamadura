<?php

namespace App\Http\Controllers\Admin\Layanan\KatalogLayanan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\StoreKatalogLayananRequest;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\UpdateKatalogLayananRequest;
use App\Models\KatalogLayanan;
use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananQueryService;
use Illuminate\Http\Request;

class KatalogLayananItemsController extends Controller
{
    public function __construct(private KatalogLayananQueryService $query) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katalogLayananId = $request->get('katalog_layanan_id');
        $search = trim($request->get('search'));

        $filters = [
            'katalog_layanan_id' => $katalogLayananId,
            'search' => $search,
        ];

        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.layanan.katalog-layanan.partials.table', compact('items', 'katalogLayananId', 'search'));
        }

        return view('admin.pages.layanan.katalog-layanan.index', compact('items', 'katalogLayananId', 'search'));
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
        KatalogLayanan::create($request->validated());

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
    public function update(UpdateKatalogLayananRequest $request, KatalogLayanan $katalogLayanan)
    {
        $katalogLayanan->update($request->validated());

        return redirect()->back()->with('success', 'Katalog layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KatalogLayanan $katalogLayanan)
    {
        $katalogLayanan->delete();
        return redirect()->back()->with('success', 'Katalog layanan berhasil dihapus.');
    }
}
