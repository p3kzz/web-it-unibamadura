<?php

namespace App\Services\Admin\SettingWeb\KonfigurasiFooter;

use App\Models\SettingFooter;

class KonfigurasiFooterQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems(array $filters)
    {
        return SettingFooter::query()
            ->when($filters['type'] ?? null, function ($q) use ($filters) {
                return $q->where('type', $filters['type']);
            })
            ->when($filters['search'], function ($q) use ($filters) {
                $search = $filters['search'];

                $q->where(function ($sub) use ($search) {
                    $sub->where('type', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");
                });
            })

            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
