<?php

namespace App\Http\Controllers\Admin\Tentang\PilarTransformasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\PilarTransformasi\StorePilarTransformasiRequest;
use App\Http\Requests\Admin\Tentang\PilarTransformasi\UpdatePilarTransformasiRequest;
use App\Models\PilarTransformasi;
use App\Services\Admin\Tentang\PilarTransformasi\PilarTransformasiQueryService;
use Illuminate\Http\Request;

class PilarTransformasiController extends Controller
{
    public function index(Request $request, PilarTransformasiQueryService $queryService)
    {
        $periodeFilter = $request->get('periode_id');
        $search = trim($request->get('search'));

        $filters = [
            'periode_id' => $periodeFilter,
            'search' => $search,
        ];

        $items = $queryService->getItems($filters);
        $periodes = $queryService->getPeriodes();

        if ($request->ajax()) {
            return view('admin.pages.tentang.pilar-transformasi.partials.table', compact('items', 'periodeFilter', 'periodes', 'search'));
        }

        return view('admin.pages.tentang.pilar-transformasi.index', compact('items', 'periodeFilter', 'periodes', 'search'));
    }

    public function create()
    {
        //
    }

    public function store(StorePilarTransformasiRequest $request)
    {
        PilarTransformasi::create($request->validated());

        return redirect()->back()->with('success', 'Pilar Transformasi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UpdatePilarTransformasiRequest $request, PilarTransformasi $pilarTransformasi)
    {
        $pilarTransformasi->update($request->validated());

        return redirect()->back()->with('success', 'Pilar Transformasi berhasil diperbarui.');
    }

    public function destroy(PilarTransformasi $pilarTransformasi)
    {
        $pilarTransformasi->delete();
        return redirect()->back()->with('success', 'Pilar Transformasi berhasil dihapus.');
    }
}
