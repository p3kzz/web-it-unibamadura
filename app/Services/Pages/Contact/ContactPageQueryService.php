<?php

namespace App\Services\Pages\Contact;

use App\Models\Contact;

class ContactPageQueryService
{
    public function getActiveContacts()
    {
        return Contact::query()
            ->where('is_active', true)
            ->orderBy('type')
            ->orderBy('label')
            ->get()
            ->groupBy('type');
    }
}
