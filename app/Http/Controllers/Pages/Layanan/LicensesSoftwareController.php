<?php

namespace App\Http\Controllers\Pages\Layanan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Layanan\LicensesSoftwarePageQueryService;
use Illuminate\Http\Request;

class LicensesSoftwareController extends Controller
{
    public function __construct(
        private readonly LicensesSoftwarePageQueryService $licensesQuery
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = $this->licensesQuery->getPaginatedActive(9);

        return view('pages.layanan.lisensi-software.index', compact('licenses'));
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
    public function show(string $lisensi_software)
    {
        $license = $this->licensesQuery->getPublishedDetailOrFail($lisensi_software);
        $relatedLicenses = $this->licensesQuery->getRelatedActive($license);

        return view('pages.layanan.lisensi-software.show', compact('license', 'relatedLicenses'));
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
