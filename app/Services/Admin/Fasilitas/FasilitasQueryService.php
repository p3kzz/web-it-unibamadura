<?php

namespace App\Services\Admin\Fasilitas;

use App\Models\Fasilitas;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class FasilitasQueryService
{
    /**
     * Get paginated items with filters.
     */
    public function getItems(array $filters): Paginator
    {
        return Fasilitas::query()
            ->with('galleryImages')
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('nama', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    /**
     * Get all active fasilitas for public display.
     */
    public function getActive(int $limit = null): Collection
    {
        return Fasilitas::query()
            ->with('galleryImages')
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    /**
     * Get fasilitas by ID.
     */
    public function findById(int $id): ?Fasilitas
    {
        return Fasilitas::find($id);
    }
}
