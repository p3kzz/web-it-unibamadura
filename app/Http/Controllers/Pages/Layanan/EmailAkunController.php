<?php

namespace App\Http\Controllers\Pages\Layanan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Layanan\EmailAkunPageQueryService;
use Illuminate\Http\Request;

class EmailAkunController extends Controller
{
     public function __construct(
        private readonly EmailAkunPageQueryService $emailAkunsQuery
    ) {}
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $emailAkuns = $this->emailAkunsQuery->getPaginatedActive(9);

        return view('pages.layanan.email-akun.index', compact('emailAkuns'));
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
    public function show(string $email_akun)
    {
        $emailAkuns = $this->emailAkunsQuery->getPublishedDetailOrFail($email_akun);
        $relatedEmailAkuns = $this->emailAkunsQuery->getRelatedActive($emailAkuns);

        return view('pages.layanan.email-akun.show', compact('emailAkuns', 'relatedEmailAkuns'));
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
