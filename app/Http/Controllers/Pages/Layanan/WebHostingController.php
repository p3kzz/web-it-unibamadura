<?php

namespace App\Http\Controllers\Pages\Layanan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Layanan\WebHostingPageQueryService;
use Illuminate\Http\Request;

class WebHostingController extends Controller
{
    public function __construct(
        private readonly WebHostingPageQueryService $hostingQuery
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hostings = $this->hostingQuery->getPaginatedActive(9);

        return view('pages.layanan.web-hosting.index', compact('hostings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $web_hosting)
    {
        $hosting = $this->hostingQuery->getPublishedDetailOrFail($web_hosting);
        $relatedHostings = $this->hostingQuery->getRelatedActive($hosting);

        return view('pages.layanan.web-hosting.show', compact('hosting', 'relatedHostings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
