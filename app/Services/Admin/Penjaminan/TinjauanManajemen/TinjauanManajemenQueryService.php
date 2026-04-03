<?php

namespace App\Services\Admin\Penjaminan\TinjauanManajemen;

use App\Models\TinjauanManajemen;

class TinjauanManajemenQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return TinjauanManajemen::query()
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

    public function getBySlug(string $slug): TinjauanManajemen
    {
        return TinjauanManajemen::query()
            ->with('sections')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
