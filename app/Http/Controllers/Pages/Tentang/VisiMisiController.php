<?php

namespace App\Http\Controllers\Pages\Tentang;

use App\Http\Controllers\Controller;
use App\Models\VisiMisiItem;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = VisiMisiItem::where('section', 'visi')
            ->where('is_active', true)
            ->latest()
            ->first();

        $misi = VisiMisiItem::where('section', 'misi')
            ->where('is_active', true)
            ->latest()
            ->get();

        $tujuan = VisiMisiItem::where('section', 'tujuan')
            ->where('is_active', true)
            ->latest()
            ->get();

        $sasaran = VisiMisiItem::where('section', 'sasaran')
            ->where('is_active', true)
            ->latest()
            ->get();
        return view('pages.tentang.visi-misi', compact('visi', 'misi', 'tujuan', 'sasaran'));
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
