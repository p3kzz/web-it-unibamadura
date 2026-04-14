<?php

namespace App\Http\Controllers\Admin\SettingWeb\KonfigurasiLogo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingWeb\KonfigurasiLogo\StoreKonfigurasiLogoRequest;
use App\Http\Requests\Admin\SettingWeb\KonfigurasiLogo\UpdateKonfigurasiLogoRequest;
use App\Models\KonfigurasiLogo;
use App\Services\Admin\SettingWeb\KonfigurasiLogo\KonfigurasiLogoQueryService;
use App\Services\Admin\SettingWeb\KonfigurasiLogo\KonfigurasiLogoservice;
use Illuminate\Http\Request;

class KonfigurasiLogoController extends Controller
{
    public function __construct(
        private readonly KonfigurasiLogoQueryService $query,
        private readonly KonfigurasiLogoservice $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $this->query->getItems();
        return view('admin.pages.setting.konfigurasi-logo.index', compact('items'));
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
    public function store(StoreKonfigurasiLogoRequest $request)
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
    public function update(UpdateKonfigurasiLogoRequest $request, KonfigurasiLogo $konfigurasiLogo)
    {
        $this->service->update($konfigurasiLogo, $request->validated());
        return back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KonfigurasiLogo $konfigurasiLogo)
    {
        $this->service->delete($konfigurasiLogo);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
