<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Admin\Penjaminan\Sop\SopQueryService;

class SopController extends Controller
{
    public function __construct(
        private readonly SopQueryService $sopQuery
    ) {}

    public function index()
    {
        $sopItems = $this->sopQuery->getActive();

        return view('pages.penjaminan-mutu.sop.index', compact('sopItems'));
    }
}
