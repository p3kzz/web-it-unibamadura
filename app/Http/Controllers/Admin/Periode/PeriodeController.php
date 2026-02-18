<?php

namespace App\Http\Controllers\Admin\Periode;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Periode\StorePeriodeRequest;
use App\Http\Requests\Admin\Periode\UpdatePeriodeRequest;
use App\Models\Periode;
use App\Services\Admin\Periode\PeriodeService;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periode = Periode::orderByDesc('start_year')->paginate(10);
        return view('admin.pages.periode.index', compact('periode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeriodeRequest $request, PeriodeService $periode)
    {
        $periode->create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Data berhasil disimpan');
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
    public function update(UpdatePeriodeRequest $request, Periode $periode, PeriodeService $services)
    {
        $services->update($periode, $request->validated());

        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();

        return redirect()->route('admin.periode.index')->with('success', 'Periode berhasil dihapus.');
    }
}
