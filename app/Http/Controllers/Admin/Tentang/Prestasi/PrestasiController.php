<?php

namespace App\Http\Controllers\Admin\Tentang\Prestasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\Prestasi\StorePrestasiRequest;
use App\Http\Requests\Admin\Tentang\Prestasi\UpdatePrestasiRequest;
use App\Models\Prestasi;
use App\Services\Admin\Tentang\Prestasi\PrestasiQueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index(Request $request, PrestasiQueryService $queryService)
    {
        $yearFilter = $request->get('year');
        $search = trim($request->get('search'));

        $filters = [
            'year' => $yearFilter,
            'search' => $search,
        ];

        $items = $queryService->getItems($filters);
        $years = $queryService->getYears();

        if ($request->ajax()) {
            return view('admin.pages.tentang.prestasi.partials.table', compact('items', 'yearFilter', 'years', 'search'));
        }

        return view('admin.pages.tentang.prestasi.index', compact('items', 'yearFilter', 'years', 'search'));
    }

    public function store(StorePrestasiRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->back()->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function update(UpdatePrestasiRequest $request, Prestasi $prestasi)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($prestasi->image) {
                Storage::disk('public')->delete($prestasi->image);
            }
            $data['image'] = $request->file('image')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->back()->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->image) {
            Storage::disk('public')->delete($prestasi->image);
        }

        $prestasi->delete();
        return redirect()->back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
