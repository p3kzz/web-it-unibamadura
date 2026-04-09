<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\StoreContactRequest;
use App\Http\Requests\Admin\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Services\Admin\Contact\ContactQueryService;
use App\Services\Admin\Contact\ContactService;
use Illuminate\Http\Request;

class ContactItemsController extends Controller
{
    public function __construct(
        private readonly ContactQueryService $query,
        private readonly ContactService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $type = $request->get('type');
        $filters = $request->only(['search', 'type']);
        $items = $this->query->getItems($filters);

        if ($request->ajax()) {
            return view('admin.pages.contact.partials.table', compact('items', 'search', 'type'));
        }

        return view('admin.pages.contact.index', compact('items', 'search', 'type'));
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
    public function store(StoreContactRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Data kontak berhasil ditambahkan');
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
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->service->update($contact, $request->validated());

        return back()->with('success', 'Data kontak berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $this->service->delete($contact);

        return back()->with('success', 'Data kontak berhasil dihapus');
    }
}
