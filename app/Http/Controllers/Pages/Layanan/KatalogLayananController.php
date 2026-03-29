<?php

namespace App\Http\Controllers\Pages\Layanan;

use App\Http\Controllers\Controller;
use App\Models\KatalogLayanan;
use App\Services\Pages\Layanan\LayananPageQueryService;
use Illuminate\Http\Request;

class KatalogLayananController extends Controller
{
    public function __construct(
        private readonly LayananPageQueryService $layananQuery
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katalogLayanan = $this->layananQuery->getPaginatedKatalog(12);
        $kategoriLayanan = $this->layananQuery->getActiveKategori();

        return view('pages.layanan.katalog-layanan.index', compact(
            'katalogLayanan',
            'kategoriLayanan'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(KatalogLayanan $katalogLayanan)
    {
        $katalogLayanan = $this->layananQuery->getPublishedDetailOrFail($katalogLayanan);
        $relatedLayanan = $this->layananQuery->getRelatedKatalog($katalogLayanan);

        return view('pages.layanan.katalog-layanan.show', compact('katalogLayanan', 'relatedLayanan'));
    }

    /**
     * Create, Store, Edit, Update, Destroy adalah untuk admin saja
     */
    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        abort(404);
    }

    public function update(Request $request, string $id)
    {
        abort(404);
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}
