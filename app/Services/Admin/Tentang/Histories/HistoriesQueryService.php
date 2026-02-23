<?php

namespace App\Services\Admin\Tentang\Histories;

use App\Models\Histories;

class HistoriesQueryService
{
    /**
     * Create a new class instance.
     */
    public function list(?string $type = null)
    {
        return Histories::query()
            ->when($type, fn($q) => $q->where('type', $type))
            ->orderBy('order')
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
