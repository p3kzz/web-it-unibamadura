<?php

namespace App\Http\Controllers\Admin\Layanan\KategoriLayanan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\KategoriLayanan\StoreKategoriLayananRequest;
use App\Http\Requests\Admin\Layanan\KategoriLayanan\UpdateKategoriLayananRequest;
use App\Models\KategoriLayanan;
use App\Services\Admin\Layanan\KategoriLayanan\KategoriLayananQueryService;
use Illuminate\Http\Request;

class KategoriLayananItemsController extends Controller
{
    public function __construct( private KategoriLayananQueryService $query) {}
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
            return view('admin.pages.layanan.kategori-layanan.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.layanan.kategori-layanan.index', compact('items', 'search'));
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
    public function store(StoreKategoriLayananRequest $request)
    {
        KategoriLayanan::create($request->validated());

        return redirect()->back()->with('success', 'Kategori layanan berhasil ditambahkan.');
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
    public function update(UpdateKategoriLayananRequest $request, KategoriLayanan $kategoriLayanan)
    {
        $kategoriLayanan->update($request->validated());

        return redirect()->back()->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriLayanan $kategoriLayanan)
    {
        $kategoriLayanan->delete();

        return redirect()->back()->with('success', 'Kategori layanan berhasil dihapus.');
    }
}
