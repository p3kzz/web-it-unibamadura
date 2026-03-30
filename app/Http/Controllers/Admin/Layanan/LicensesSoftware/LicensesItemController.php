<?php

namespace App\Http\Controllers\Admin\Layanan\LicensesSoftware;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\LicensesSoftware\StoreLicensesRequest;
use App\Http\Requests\Admin\Layanan\LicensesSoftware\UpdateLicensesRequest;
use App\Models\SoftwareLicenses;
use App\Services\Admin\Layanan\LicensesSoftware\LicensesQueryService;
use App\Services\Admin\Layanan\LicensesSoftware\LicensesService;
use Illuminate\Http\Request;

class LicensesItemController extends Controller
{
    public function __construct(private LicensesQueryService $query, private LicensesService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = $request->only(['search']);
        $items = $this->query->getItems($filters);
        if ($request->ajax()) {
            return view('admin.pages.layanan.lisensi-software.partials.table', compact('items', 'search'));
        }
        return view('admin.pages.layanan.lisensi-software.index', compact('items', 'search'));
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
    public function store(StoreLicensesRequest $request)
    {
        $this->service->store($request->validated());
        return back()->with('success', 'Data berhasil ditambahkan');
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
    public function update(UpdateLicensesRequest $request, SoftwareLicenses $lisensi_software)
    {
        $this->service->update($lisensi_software, $request->validated());
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareLicenses $lisensi_software)
    {
        $this->service->delete($lisensi_software);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
