<?php

namespace App\View\Composers;

use App\Models\KonfigurasiLogo;
use Illuminate\View\View;

class KonfigurasiLogoComposer
{
    /**
     * Create a new class instance.
     */
    public function compose(View $view): void
    {
        $konfigurasilogo = KonfigurasiLogo::query()
            ->active()
            ->first(['id', 'logo_web', 'nama_web']);
        $view->with('konfigurasilogo', $konfigurasilogo);
    }
}
