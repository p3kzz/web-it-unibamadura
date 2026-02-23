<?php

namespace App\Http\Controllers\Admin\Tentang\Histories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\Histories\StoreHistoriesRequest;
use App\Http\Requests\Admin\Tentang\Histories\UpdateHistoriesRequest;
use App\Models\Histories;
use App\Services\Admin\Tentang\Histories\HistoriesQueryService;
use App\Services\Admin\Tentang\Histories\HistoriesService;
use Illuminate\Http\Request;

class HistoriesItemsController extends Controller
{
    public function __construct(private HistoriesService $service, private HistoriesQueryService $query) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $histories = $this->query->list($request->type);

        return view('admin.pages.tentang.sejarah.index', compact('histories'));
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
    public function store(StoreHistoriesRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data berhasil ditambahkan');
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
    public function update(UpdateHistoriesRequest $request, Histories $history)
    {
        $this->service->update($history, $request->validated());

        return back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Histories $history)
    {
        $this->service->delete($history);

        return back()->with('success', 'Data berhasil dihapus');
    }
}
