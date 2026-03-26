<?php

namespace App\Http\Controllers\Pages\Content;

use App\Http\Controllers\Controller;
use App\Services\Pages\Content\ContentPageQueryService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(private readonly ContentPageQueryService $contentQuery) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $type)
    {
        $search = trim((string) $request->get('search'));

        $items = $this->contentQuery->getPaginatedByType($type, [
            'search' => $search,
            'per_page' => 9,
        ]);

        $pageMeta = $this->contentQuery->getTypeMeta($type);

        return view('pages.content.index', compact('items', 'type', 'search', 'pageMeta'));
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
    public function show(string $type, string $slug)
    {
        $content = $this->contentQuery->findPublishedByTypeAndSlug($type, $slug);
        $content->increment('views');
        $pageMeta = $this->contentQuery->getTypeMeta($type);
        $relatedItems = $this->contentQuery->getRelated($content);

        return view('pages.content.show', compact('content', 'pageMeta', 'relatedItems'));
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


