<?php

namespace App\Http\Controllers\Admin\Penjaminan\Sop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\Sop\StoreSopRequest;
use App\Http\Requests\Admin\Penjaminan\Sop\UpdateSopRequest;
use App\Models\SopItem;
use App\Services\Admin\Penjaminan\Sop\SopService;
use App\Services\Admin\Penjaminan\Sop\SopQueryService;
use Illuminate\Http\Request;

class SopItemsController extends Controller
{
    public function __construct(
        private SopService $service,
        private SopQueryService $queryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = ['search' => $search];
        $items = $this->queryService->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.penjaminan-mutu.sop.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.penjaminan-mutu.sop.index', compact('items', 'search'));
    }

    public function store(StoreSopRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back()->with('success', 'SOP berhasil ditambahkan.');
    }

    public function update(UpdateSopRequest $request, SopItem $sop)
    {
        $this->service->update($sop, $request->validated());
        return redirect()->back()->with('success', 'SOP berhasil diperbarui.');
    }

    public function destroy(SopItem $sop)
    {
        $this->service->delete($sop);
        return redirect()->back()->with('success', 'SOP berhasil dihapus.');
    }
}
