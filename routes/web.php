<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\Tentang\PrestasiController;
use App\Http\Controllers\Pages\Tentang\ProgramKerjaController;
use App\Http\Controllers\Pages\Tentang\SdmController;
use App\Http\Controllers\Pages\Tentang\SejarahController;
use App\Http\Controllers\Pages\Tentang\StrukturOrganisasiController;
use App\Http\Controllers\Pages\Tentang\VisiMisiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::resource('/visi-misi', VisiMisiController::class);
Route::resource('/sejarah', SejarahController::class);
Route::resource('/struktur-organisasi', StrukturOrganisasiController::class);
Route::resource('/sumber-daya-manusia', SdmController::class);
Route::resource('/program-kerja', ProgramKerjaController::class);
Route::resource('/prestasi', PrestasiController::class);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
