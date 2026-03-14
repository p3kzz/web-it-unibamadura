<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StoreContentRequest;
use App\Http\Requests\Admin\Content\UpdateContentRequest;
use App\Models\Content;
use App\Services\Admin\Content\ContentQueryService;
use App\Services\Admin\Content\ContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $statusFilter = $request->get('status');

        $filters = [
            'type' => $section,
            'search' => $search,
            'status' => $statusFilter,
        ];

        $items = $this->query->getItems($filters);
        if ($request->ajax()) {
            return view('admin.pages.content.partials.table', compact('items', 'section', 'search', 'statusFilter'));
        }

        return view('admin.pages.content.index', compact('items', 'section', 'search', 'statusFilter'));
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
    public function store(StoreContentRequest $request)
    {
        $this->service->store($request->validated());
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
    public function update(UpdateContentRequest $request, Content $content)
    {
        $this->service->update($content, $request->validated());
        return back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $this->service->delete($content);
        return back()->with('success', 'Data berhasil dihapus');
    }

    /**
     * Handle image upload from Summernote editor.
     */
    public function uploadEditorImage(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('file');
        $filename = Str::uuid() . '.' . $file->extension();
        $path = $file->storeAs('content/editor', $filename, 'public');

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }
}
