<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Admin\Penjaminan\SistemDokumen\SistemDokumenQueryService;

class SistemDokumenController extends Controller
{
    public function __construct(
        private readonly SistemDokumenQueryService $sistemDokumenQuery
    ) {}

    public function index()
    {
        $dokumenItems = $this->sistemDokumenQuery->getActive();

        return view('pages.penjaminan-mutu.sistem-dokumen.index', compact('dokumenItems'));
    }
}
