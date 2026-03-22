<?php

namespace App\Http\Controllers\Admin\Tentang\Sdm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\Sdm\StorePegawaiRequest;
use App\Http\Requests\Admin\Tentang\Sdm\UpdatePegawaiRequest;
use App\Models\Pegawai;
use App\Services\Admin\Tentang\Sdm\PegawaiQueryService;
use App\Services\Admin\Tentang\Sdm\PegawaiService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function __construct(
        private PegawaiService $service,
        private PegawaiQueryService $query
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->query->getIndexData(
            $request->get('struktur_id'),
            $request->get('unit_id')
        );

        $view = $request->ajax()
            ? 'admin.pages.tentang.sdm.partials.content'
            : 'admin.pages.tentang.sdm.index';

        return view($view, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        $pegawai = $this->query->findById($pegawai->id);

        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $this->service->update($pegawai, $request->validated());

        return back()->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $this->service->delete($pegawai);

        return back()->with('success', 'Pegawai berhasil dihapus.');
    }
}
