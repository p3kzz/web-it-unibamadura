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
        return Content::query()
            ->where('type', $filters['type'])
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%");
                    $sub->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
