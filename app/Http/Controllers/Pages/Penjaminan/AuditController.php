<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Penjaminan\AuditPageQueryService;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function __construct(
        private readonly AuditPageQueryService $auditQuery
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audits = $this->auditQuery->getPaginatedActive(9);

        return view('pages.penjaminan-mutu.audit.index', compact('audits'));
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
    public function show(string $audit)
    {
        $audit = $this->auditQuery->getPublishedDetailOrFail($audit);
        $relatedAudits = $this->auditQuery->getRelatedActive($audit);

        return view('pages.penjaminan-mutu.audit.show', compact('audit', 'relatedAudits'));
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
