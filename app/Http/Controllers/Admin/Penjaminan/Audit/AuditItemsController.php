<?php

namespace App\Http\Controllers\Admin\Penjaminan\Audit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\Audit\StoreAuditRequest;
use App\Http\Requests\Admin\Penjaminan\Audit\UpdateAuditRequest;
use App\Models\Audit;
use App\Services\Admin\Penjaminan\Audit\AuditQueryService;
use App\Services\Admin\Penjaminan\Audit\AuditService;
use Illuminate\Http\Request;

class AuditItemsController extends Controller
{
    public function __construct(
        private readonly AuditQueryService $query,
        private readonly AuditService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = $request->only(['search']);
        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.penjaminan-mutu.audit.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.penjaminan-mutu.audit.index', compact('items', 'search'));
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
    public function store(StoreAuditRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data audit berhasil ditambahkan');
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
    public function update(UpdateAuditRequest $request, Audit $audit)
    {
        $this->service->update($audit, $request->validated());

        return back()->with('success', 'Data audit berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audit $audit)
    {
        $this->service->delete($audit);

        return back()->with('success', 'Data audit berhasil dihapus');
    }
}
