<?php

namespace App\Services\Admin\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactService
{
    /**
     * Create a new class instance.
     */
    public function store(array $data): Contact
    {
        return DB::transaction(function () use ($data) {
            return Contact::create($data);
        });
    }

    public function update(Contact $contact, array $data): Contact
    {
        return DB::transaction(function () use ($contact, $data) {
            $contact->update($data);
            return $contact;
        });
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }
}
