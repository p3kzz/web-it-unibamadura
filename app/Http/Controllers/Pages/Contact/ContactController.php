<?php

namespace App\Http\Controllers\Pages\Contact;

use App\Http\Controllers\Controller;
use App\Services\Pages\Contact\ContactPageQueryService;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactPageQueryService $query
    ) {}

    public function index()
    {
        $groupedByType = $this->query->getActiveContacts();

        return view('pages.contact.index', compact('groupedByType'));
    }
}

