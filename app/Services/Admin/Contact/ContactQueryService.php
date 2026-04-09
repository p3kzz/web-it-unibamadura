<?php

namespace App\Services\Admin\Contact;

use App\Models\Contact;

class ContactQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return Contact::query()
            ->when($filters['type'] ?? null, function ($query) use ($filters) {
                $query->where('type', $filters['type']);
            })
            ->when($filters['search'] ?? null, function ($query) use ($filters) {
                $search = $filters['search'];

                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('label', 'like', "%{$search}%")
                        ->orWhere('value', 'like', "%{$search}%")
                        ->orWhere('type', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
