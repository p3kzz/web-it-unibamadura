<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Services\Admin\Content\ContentQueryService;
use App\Services\Admin\Content\ContentService;
use Illuminate\Http\Request;

class ContentItemsController extends Controller
{
    public function __construct(private ContentService $service, private ContentQueryService $query) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $section = $request->get('type', 'news');
        $search = trim($request->get('search'));
        $filters = [
            'type' => $section,
            'search' => $search,
        ];
        $items = $this->query->getItems($filters);
        if ($request->ajax()) {
            return view('admin.pages.content.partials.table', compact('items', 'section', 'search'));
        }

        return view('admin.pages.content.index', compact('items', 'section', 'search'));
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
        $this->service->store($request->validate());
        return back()->withErrors('success', 'Data berhasil ditambahkan');
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
    public function update(Request $request, Content $content)
    {
        $this->service->update($content, $request->validate());
        return back()->withErrors('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
