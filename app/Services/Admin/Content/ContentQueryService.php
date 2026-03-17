<?php

namespace App\Services\Admin\Content;

use App\Models\Content;

class ContentQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        $query = Content::query()
            ->where('type', $filters['type'])
            ->when(($filters['status'] ?? null) === 'trashed', function ($q) {
                $q->onlyTrashed();
            })
            ->when(in_array($filters['status'] ?? null, ['published', 'draft'], true), function ($q) use ($filters) {
                $q->where('status', $filters['status']);
            })
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            });

        return $query
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
