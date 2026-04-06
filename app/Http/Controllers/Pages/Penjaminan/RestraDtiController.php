<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Admin\Penjaminan\RestraDti\RestraDtiQueryService;
use Illuminate\Http\Request;

class RestraDtiController extends Controller
{
    public function __construct(
        private readonly RestraDtiQueryService $restraQuery
    ) {}

    public function index()
    {
        $restraItems = $this->restraQuery->getActive();

        return view('pages.penjaminan-mutu.renstra-dti.index', compact('restraItems'));
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
