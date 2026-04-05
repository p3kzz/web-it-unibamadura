<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Penjaminan\TinjauanManajemenPageQueryService;
use Illuminate\Http\Request;

class TinjauanManajemenController extends Controller
{
   public function __construct(
        private readonly TinjauanManajemenPageQueryService $tinjauanManajemenQuery
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tinjauan = $this->tinjauanManajemenQuery->getPaginatedActive(9);

        return view('pages.penjaminan-mutu.tinjauan-manajemen.index', compact('tinjauan'));
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
    public function show(string $tinjauan)
    {
        $tinjauan = $this->tinjauanManajemenQuery->getPublishedDetailOrFail($tinjauan);
        $relatedTinjauan = $this->tinjauanManajemenQuery->getRelatedActive($tinjauan);

        return view('pages.penjaminan-mutu.tinjauan-manajemen.show', compact('tinjauan', 'relatedTinjauan'));
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
