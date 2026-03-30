<?php

namespace App\Http\Controllers\Admin\Layanan\WebHosting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\WebHosting\StoreWebHostingRequest;
use App\Http\Requests\Admin\Layanan\WebHosting\UpdateWebHostingRequest;
use App\Models\WebHosting;
use App\Services\Admin\Layanan\WebHosting\WebHostingQueryService;
use App\Services\Admin\Layanan\WebHosting\WebHostingService;
use Illuminate\Http\Request;

class WebHostingItemsController extends Controller
{
    public function __construct(
        private readonly WebHostingQueryService $query,
        private readonly WebHostingService $service
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
            return view('admin.pages.layanan.web-hosting.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.layanan.web-hosting.index', compact('items', 'search'));
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
    public function store(StoreWebHostingRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data web hosting berhasil ditambahkan');
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
    public function update(UpdateWebHostingRequest $request, WebHosting $web_hosting)
    {
        $this->service->update($web_hosting, $request->validated());

        return back()->with('success', 'Data web hosting berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebHosting $web_hosting)
    {
        $this->service->delete($web_hosting);

        return back()->with('success', 'Data web hosting berhasil dihapus');
    }
}
