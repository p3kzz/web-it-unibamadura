<?php

namespace App\Services\Admin\SettingWeb\KonfigurasiLogo;

use App\Models\KonfigurasiLogo;

class KonfigurasiLogoQueryService
{
    /**
     * Create a new class instance.
     */
    public function getItems()
    {
        $query = KonfigurasiLogo::query();

        return $query
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }
}
