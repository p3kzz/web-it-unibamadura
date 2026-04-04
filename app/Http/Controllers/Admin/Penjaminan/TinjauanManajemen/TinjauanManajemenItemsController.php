<?php

namespace App\Http\Controllers\Admin\Penjaminan\TinjauanManajemen;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Penjaminan\TinjauanManajemen\StoreTinjauanManajemenRequest;
use App\Http\Requests\Admin\Penjaminan\TinjauanManajemen\UpdateTinjauanManajemenRequest;
use App\Models\TinjauanManajemen;
use App\Services\Admin\Penjaminan\TinjauanManajemen\TinjauanManajemenQueryService;
use App\Services\Admin\Penjaminan\TinjauanManajemen\TinjauanManajemenService;
use Illuminate\Http\Request;

class TinjauanManajemenItemsController extends Controller
{
    public function __construct(
        private readonly TinjauanManajemenQueryService $query,
        private readonly TinjauanManajemenService $service
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
            return view('admin.pages.penjaminan-mutu.tinjauan-manajemen.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.penjaminan-mutu.tinjauan-manajemen.index', compact('items', 'search'));
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
    public function store(StoreTinjauanManajemenRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data tinjauan manajemen berhasil ditambahkan');
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
    public function update(UpdateTinjauanManajemenRequest $request, TinjauanManajemen $tinjauan_manajeman)
    {
        $this->service->update($tinjauan_manajeman, $request->validated());

        return back()->with('success', 'Data tinjauan manajemen berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinjauanManajemen $tinjauan_manajeman)
    {
        $this->service->delete($tinjauan_manajeman);

        return back()->with('success', 'Data tinjauan manajemen berhasil dihapus');
    }
}
