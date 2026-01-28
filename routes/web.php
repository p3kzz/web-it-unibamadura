<?php

use App\Http\Controllers\Pages\Tentang\ProgramKerjaController;
use App\Http\Controllers\Pages\Tentang\SdmController;
use App\Http\Controllers\Pages\Tentang\SejarahController;
use App\Http\Controllers\Pages\Tentang\StrukturOrganisasiController;
use App\Http\Controllers\Pages\Tentang\VisiMisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/visi-misi', VisiMisiController::class);
Route::resource('/sejarah', SejarahController::class);
Route::resource('/struktur-organisasi', StrukturOrganisasiController::class);
Route::resource('/sumber-daya-manusia', SdmController::class);
Route::resource('/program-kerja', ProgramKerjaController::class);
