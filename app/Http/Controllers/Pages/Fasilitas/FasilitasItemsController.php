<?php

namespace App\Http\Controllers\Pages\Fasilitas;

use App\Http\Controllers\Controller;
use App\Services\Admin\Fasilitas\FasilitasQueryService;

class FasilitasItemsController extends Controller
{
    public function __construct(
        private readonly FasilitasQueryService $fasilitasQuery
    ) {}

    public function index()
    {
        $fasilitasItems = $this->fasilitasQuery->getActive();

        return view('pages.fasilitas.index', compact('fasilitasItems'));
    }
}
