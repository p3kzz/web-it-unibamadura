<?php

namespace App\Http\Controllers\Admin\Tentang;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\StoreVisiMisiRequest;
use App\Http\Requests\Admin\Tentang\UpdateVisiMisiRequest;
use App\Models\VisiMisiItem;
use Illuminate\Http\Request;

class VisiMisiItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $section = $request->get('section', 'visi');

        $items = VisiMisiItem::whereSection($section)
            ->latest()
            ->simplePaginate(10);

        return view('admin.pages.tentang.visi-misi.index', compact('items', 'section'));
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

    private function normalizeOrder(string $section): void
    {
        VisiMisiItem::section($section)
            ->orderBy('order')
            ->orderBy('id')
            ->get()
            ->values()
            ->each(function ($item, $index) {
                $item->update([
                    'order' => $index + 1
                ]);
            });
    }
}
