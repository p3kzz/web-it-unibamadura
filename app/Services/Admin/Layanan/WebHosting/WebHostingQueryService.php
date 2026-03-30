<?php

namespace App\Services\Admin\Layanan\WebHosting;

use App\Models\WebHosting;

class WebHostingQueryService
{
    public function getItems(array $filters)
    {
        return WebHosting::query()
            ->with('sections')
            ->when($filters['search'] ?? null, function ($query) use ($filters) {
                $search = $filters['search'];

                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('sections', function ($sectionQuery) use ($search) {
                            $sectionQuery->where('title', 'like', "%{$search}%")
                                ->orWhere('content', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getBySlug(string $slug): WebHosting
    {
        return WebHosting::query()
            ->with('sections')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
