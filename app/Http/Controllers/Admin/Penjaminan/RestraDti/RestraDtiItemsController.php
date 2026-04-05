<?php

namespace App\Http\Controllers\Admin\Penjaminan\RestraDti;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\RestraDti\StoreRestraDtiRequest;
use App\Http\Requests\Admin\Penjaminan\RestraDti\UpdateRestraDtiRequest;
use App\Models\RestraDti;
use App\Services\Admin\Penjaminan\RestraDti\RestraDtiQueryService;
use App\Services\Admin\Penjaminan\RestraDti\RestraDtiService;
use Illuminate\Http\Request;

class RestraDtiItemsController extends Controller
{
    public function __construct(
        private RestraDtiService $service,
        private RestraDtiQueryService $queryService
    ) {}

    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = ['search' => $search];
        $items = $this->queryService->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.penjaminan-mutu.renstra-dti.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.penjaminan-mutu.renstra-dti.index', compact('items', 'search'));
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
    public function store(StoreRestraDtiRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back()->with('success', 'Restra Dti berhasil ditambahkan.');
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
    public function update(UpdateRestraDtiRequest $request, RestraDti $restraDti)
    {
        $this->service->update($restraDti, $request->validated());
        return redirect()->back()->with('success', 'Restra Dti berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestraDti $restraDti)
    {
        $this->service->delete($restraDti);
        return redirect()->back()->with('success', 'Restra Dti berhasil dihapus.');
    }
}
