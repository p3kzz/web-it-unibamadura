<?php

namespace App\Http\Controllers\Admin\Tentang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\StoreVisiMisiRequest;
use App\Http\Requests\Admin\Tentang\UpdateVisiMisiRequest;
use App\Models\VisiMisiItem;
use App\Services\Admin\Tentang\VisiMisiItemsQueryService;
use Illuminate\Http\Request;

class VisiMisiItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VisiMisiItemsQueryService $queryService)
    {
        $section = $request->get('section', 'visi');
        $periodeFilter = $request->get('periode_id');
        $search = trim($request->get('search'));

        $filters = [
            'section'     => $section,
            'periode_id'  => $periodeFilter,
            'search'      => $search,
        ];

        $items = $queryService->getItems($filters);
        $periodes = $queryService->getPeriodes();

        if ($request->ajax()) {
            return view('admin.pages.tentang.visi-misi.partials.table', compact('items', 'section', 'periodeFilter', 'periodes', 'search'));
        }

        return view('admin.pages.tentang.visi-misi.index', compact('items', 'section', 'periodeFilter', 'periodes', 'search'));
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
    public function store(StoreVisiMisiRequest $request)
    {
        VisiMisiItem::create($request->validated());

        return redirect()->back()->with('success', 'Item Visi/Misi berhasil ditambahkan.');
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
    public function update(UpdateVisiMisiRequest $request, VisiMisiItem $visiMisi)
    {
        // dd($visiMisi->id);

        $visiMisi->update($request->validated());

        return redirect()->back()->with('success', 'Item Visi/Misi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisiItem $visiMisi)
    {
        $visiMisi->delete();
        return redirect()->back()->with('success', 'Item Visi/Misi berhasil dihapus.');
    }
}
