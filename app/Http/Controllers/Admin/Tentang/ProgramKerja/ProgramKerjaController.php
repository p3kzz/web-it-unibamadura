<?php

namespace App\Http\Controllers\Admin\Tentang\ProgramKerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tentang\ProgramKerja\StoreProgramKerjaRequest;
use App\Http\Requests\Admin\Tentang\ProgramKerja\UpdateProgramKerjaRequest;
use App\Models\ProgramKerja;
use App\Services\Admin\Tentang\ProgramKerja\ProgramKerjaQueryService;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index(Request $request, ProgramKerjaQueryService $queryService)
    {
        $periodeFilter = $request->get('periode_id');
        $pilarFilter = $request->get('pilar_id');
        $statusFilter = $request->get('status');
        $search = trim($request->get('search'));

        $filters = [
            'periode_id' => $periodeFilter,
            'pilar_id' => $pilarFilter,
            'status' => $statusFilter,
            'search' => $search,
        ];

        $items = $queryService->getItems($filters);
        $periodes = $queryService->getPeriodes();
        $pilars = $queryService->getPilars($periodeFilter);

        if ($request->ajax()) {
            return view('admin.pages.tentang.program-kerja.partials.table', compact('items', 'periodeFilter', 'pilarFilter', 'statusFilter', 'periodes', 'pilars', 'search'));
        }

        return view('admin.pages.tentang.program-kerja.index', compact('items', 'periodeFilter', 'pilarFilter', 'statusFilter', 'periodes', 'pilars', 'search'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProgramKerjaRequest $request)
    {
        ProgramKerja::create($request->validated());

        return redirect()->back()->with('success', 'Program Kerja berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UpdateProgramKerjaRequest $request, ProgramKerja $programKerja)
    {
        $programKerja->update($request->validated());

        return redirect()->back()->with('success', 'Program Kerja berhasil diperbarui.');
    }

    public function destroy(ProgramKerja $programKerja)
    {
        $programKerja->delete();
        return redirect()->back()->with('success', 'Program Kerja berhasil dihapus.');
    }

    public function getPilarsByPeriode(Request $request, ProgramKerjaQueryService $queryService)
    {
        $periodeId = $request->get('periode_id');
        $pilars = $queryService->getPilars($periodeId);

        return response()->json($pilars);
    }
}
