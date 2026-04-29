<?php

namespace App\View\Composers;

use App\Models\KatalogLayanan;
use Illuminate\View\View;

class LayananNavComposer
{

    public function compose(View $view): void
    {
        $layanan = KatalogLayanan::query()
            ->active()
            ->with([
                'detailKatalogLayanan' => function ($query) {
                    $query->select('id', 'katalog_layanan_id', 'title', 'slug')->limit(1);
                }
            ])
            ->orderBy('nama')
            ->get(['id', 'nama']);

        $view->with('navLayanan', $layanan);
    }
}
