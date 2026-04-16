<?php

namespace App\Http\Controllers\Admin\SettingWeb\KonfigurasiFooter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingWeb\KonfigurasiFooter\StoreKonfigurasiFooterRequest;
use App\Http\Requests\Admin\SettingWeb\KonfigurasiFooter\UpdateKonfigurasiFooterRequest;
use App\Models\SettingFooter;
use App\Services\Admin\SettingWeb\KonfigurasiFooter\KonfigurasiFooterQueryService;
use Illuminate\Http\Request;

class KonfigurasiFooterController extends Controller
{
    public function __construct(
        private readonly KonfigurasiFooterQueryService $query
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->get('type', 'tautan cepat');
        $search = trim($request->get('search'));

        $filters = [
            'type' => $type,
            'search' => $search,
        ];
        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.setting.konfigurasi-footer.partials.table', compact('items', 'type', 'search'));
        }
        return view('admin.pages.setting.konfigurasi-footer.index', compact('items', 'type', 'search'));
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
    public function store(StoreKonfigurasiFooterRequest $request)
    {
        SettingFooter::create($request->validated());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
    public function update(UpdateKonfigurasiFooterRequest $request, SettingFooter $konfigurasi_footer)
    {
        $konfigurasi_footer->update($request->validated());

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingFooter $konfigurasi_footer)
    {
        $konfigurasi_footer->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
