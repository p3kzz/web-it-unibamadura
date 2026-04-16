<?php

namespace App\View\Composers;

use App\Models\SettingFooter;
use Illuminate\View\View;

class KonfigurasiFooterComposer
{
    /**
     * Create a new class instance.
     */
    public function compose(View $view): void
    {
        $konfigurasiFooter = SettingFooter::query()
            ->active()
            ->get(['id', 'type', 'nama', 'url']);
        $view->with('konfigurasiFooter', $konfigurasiFooter);
    }
}
