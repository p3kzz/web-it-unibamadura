<?php

namespace App\Http\Controllers\Pages\Tentang;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\PilarTransformasi;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodeAktif = Periode::where('is_active', true)->first();

        if (!$periodeAktif) {
            return view('pages.tentang.program-kerja', [
                'periode' => null,
                'pilars' => collect(),
                'programKerja' => collect(),
            ]);
        }

        $pilars = PilarTransformasi::where('periode_id', $periodeAktif->id)
            ->where('is_active', true)
            ->get();

        $programKerja = ProgramKerja::with('pilar')
            ->where('periode_id', $periodeAktif->id)
            ->where('is_active', true)
            ->get();

        return view('pages.tentang.program-kerja', compact(
            'periodeAktif',
            'pilars',
            'programKerja'
        ));
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
