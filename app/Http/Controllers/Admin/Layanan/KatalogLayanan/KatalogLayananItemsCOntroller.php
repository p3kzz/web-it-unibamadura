<?php

namespace App\Http\Controllers\Admin\Layanan\KatalogLayanan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\StoreKatalogLayananRequest;
use App\Http\Requests\Admin\Layanan\KatalogLayanan\UpdateKatalogLayananRequest;
use App\Models\KatalogLayanan;
use App\Models\KategoriLayanan;
use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananService;
use App\Services\Admin\Layanan\KatalogLayanan\KatalogLayananQueryService;
use Illuminate\Http\Request;

class KatalogLayananItemsCOntroller extends Controller
{
    public function __construct(
        private KatalogLayananService $service,
        private KatalogLayananQueryService $queryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $isActive = $request->get('is_active', '');
        $filters = ['search' => $search, 'is_active' => $isActive];
        $items = $this->queryService->getItems($filters);
        $categories = KategoriLayanan::orderBy('sort_order')->orderBy('nama')->get();

        if ($request->ajax()) {
            return view('admin.pages.layanan.katalog-layanan.partials.table', compact('items', 'search', 'isActive'));
        }

        return view('admin.pages.layanan.katalog-layanan.index', compact('items', 'search', 'isActive', 'categories'));
    }

    public function store(StoreKatalogLayananRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(UpdateKatalogLayananRequest $request, KatalogLayanan $katalog_layanan)
    {
        $this->service->update($katalog_layanan, $request->validated());
        return redirect()->back()->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(KatalogLayanan $katalog_layanan)
    {
        $this->service->delete($katalog_layanan);
        return redirect()->back()->with('success', 'Layanan berhasil dihapus.');
    }
}

