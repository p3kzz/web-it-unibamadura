<?php

namespace App\Http\Controllers\Pages\Layanan\KatalogLayanan;

use App\Http\Controllers\Controller;
use App\Services\Pages\Layanan\KatalogLayanan\KatalogLayananPageQuery;

class PublicKatalogLayananController extends Controller
{
    public function __construct(
        private readonly KatalogLayananPageQuery $pageQuery
    ) {}

    public function index()
    {
        $grouped = $this->pageQuery->getGroupedByCategory();
        $layananTanpaKategori = $this->pageQuery->getActive()->whereNull('kategori_layanan_id');

        return view('pages.layanan.katalog-layanan.index', compact('grouped', 'layananTanpaKategori'));
    }
}

