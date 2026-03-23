<?php

namespace App\Http\Controllers\Pages\Tentang;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::where('is_active', true)
            ->orderBy('year', 'desc')
            ->orderBy('achievement_date', 'desc')
            ->get();

        return view('pages.tentang.prestasi', compact('prestasi'));
    }
}
