<?php

namespace App\Http\Controllers\Admin\Penjaminan\SistemDokumen;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\SistemDokumen\StoreSistemDokumenRequest;
use App\Http\Requests\Admin\Penjaminan\SistemDokumen\UpdateSistemDokumenRequest;
use App\Models\SistemDokumenItem;
use App\Services\Admin\Penjaminan\SistemDokumen\SistemDokumenService;
use App\Services\Admin\Penjaminan\SistemDokumen\SistemDokumenQueryService;
use Illuminate\Http\Request;

class SistemDokumenItemsController extends Controller
{
    public function __construct(
        private SistemDokumenService $service,
        private SistemDokumenQueryService $queryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = ['search' => $search];
        $items = $this->queryService->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.penjaminan-mutu.sistem-dokumen.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.penjaminan-mutu.sistem-dokumen.index', compact('items', 'search'));
    }

    public function store(StoreSistemDokumenRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function update(UpdateSistemDokumenRequest $request, SistemDokumenItem $sistemDokumen)
    {
        $this->service->update($sistemDokumen, $request->validated());
        return redirect()->back()->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(SistemDokumenItem $sistemDokumen)
    {
        $this->service->delete($sistemDokumen);
        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
