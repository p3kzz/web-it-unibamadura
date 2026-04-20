<?php

namespace App\View\Composers;

use App\Models\KatalogLayanan;
use App\Services\Pages\Layanan\DetailLayananPageQuery;
use Illuminate\View\View;

class LayananNavComposer
{

    public function compose(View $view): void
    {
        $layanan = KatalogLayanan::query()
            ->active()
            ->with([
                'detailKatalogLayanan:id,katalog_layanan_id,title,slug'
            ])
            ->orderBy('nama')
            ->get(['id', 'nama']);

        $view->with('navLayanan', $layanan);
    }
}
