<?php

namespace App\Http\Controllers\Pages\Layanan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Layanan\DetailLayananPageQuery;
use Illuminate\Http\Request;

class DetailLayananPageController extends Controller
{
    public function __construct(
        private readonly DetailLayananPageQuery $query
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('pages.layanan.detail-layanan.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $detail = $this->query->getDetailBySlug($slug);

        return view('pages.layanan.detail-layanan.index', compact('detail'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
