<?php

namespace App\Http\Controllers\Admin\Layanan\EmailAkun;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Layanan\EmailAkun\StoreEmailAkunRequest;
use App\Http\Requests\Admin\Layanan\EmailAkun\UpdateEmailAkunRequest;
use App\Models\EmailAkun;
use App\Services\Admin\Layanan\EmailAkun\EmailAkunQueryService;
use App\Services\Admin\Layanan\EmailAkun\EmailAkunService;
use Illuminate\Http\Request;

class EmailAkunItemsController extends Controller
{
    public function __construct(
        private readonly EmailAkunQueryService $query,
        private readonly EmailAkunService $service
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $filters = $request->only(['search']);
        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.layanan.email-akun.partials.table', compact('items', 'search'));
        }

        return view('admin.pages.layanan.email-akun.index', compact('items', 'search'));
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
    public function store(StoreEmailAkunRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data email akun berhasil ditambahkan');
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
    public function update(UpdateEmailAkunRequest $request, EmailAkun $emailAkun)
    {
        $this->service->update($emailAkun, $request->validated());

        return back()->with('success', 'Data email akun berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailAkun $emailAkun)
    {
        $this->service->delete($emailAkun);

        return back()->with('success', 'Data email akun berhasil dihapus');
    }
}
