<?php

namespace App\Http\Controllers\Pages\Tentang;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use App\Models\UnitOrganisasi;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get active struktur organisasi
        $struktur = StrukturOrganisasi::with('periode')
            ->where('is_active', true)
            ->first();

        // Get units for the active struktur (with hierarchy)
        $units = collect();
        if ($struktur) {
            $units = UnitOrganisasi::where('struktur_organisasi_id', $struktur->id)
                ->whereNull('parent_id')
                ->with('childrenRecursive')
                ->get();
        }

        return view('pages.tentang.struktur-organisasi', compact('struktur', 'units'));
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
