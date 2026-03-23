<?php

use App\Http\Controllers\Admin\Content\ContentItemsController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\Periode\PeriodeController;
use App\Http\Controllers\Admin\Tentang\Histories\HistoriesItemsController;
use App\Http\Controllers\Admin\Tentang\StrukturOrganisasi\StrukturOrganisasiItemsController;
use App\Http\Controllers\Admin\Tentang\PilarTransformasi\PilarTransformasiController;
use App\Http\Controllers\Admin\Tentang\ProgramKerja\ProgramKerjaController as AdminProgramKerjaController;
use App\Http\Controllers\Admin\Tentang\Sdm\PegawaiController;
use App\Http\Controllers\Admin\Tentang\UnitOrganisasi\UnitOrganisasiController;
use App\Http\Controllers\Admin\Tentang\VisiMisi\VisiMisiItemsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\Content\ContentController;
use App\Http\Controllers\Pages\Tentang\PrestasiController;
use App\Http\Controllers\Pages\Tentang\ProgramKerjaController;
use App\Http\Controllers\Pages\Tentang\SdmController;
use App\Http\Controllers\Pages\Tentang\SejarahController;
use App\Http\Controllers\Pages\Tentang\StrukturOrganisasiController;
use App\Http\Controllers\Pages\Tentang\VisiMisiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('content')->name('content.')->group(function () {
    Route::get('/{type}', [ContentController::class, 'index'])
        ->whereIn('type', ['news', 'announcement', 'agenda'])
        ->name('index');

    Route::get('/{type}/{slug}', [ContentController::class, 'show'])
        ->whereIn('type', ['news', 'announcement', 'agenda'])
        ->name('show');
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


Route::middleware(['auth', 'admin_tik'])->prefix('admin_tik')->name('admin.')->group(function () {
    Route::resource('/dashboard', DashboardAdminController::class);
    Route::resource('/periode', PeriodeController::class)->names('periode');
    Route::resource('/visi-misi', VisiMisiItemsController::class)->names('tentang.visi-misi');
    Route::resource('/histories', HistoriesItemsController::class)->names('tentang.histories');
    Route::resource('/content', ContentItemsController::class)->names('content');
    Route::patch('/content/{content}/restore', [ContentItemsController::class, 'restore'])->name('content.restore');
    Route::post('/editor/upload-image', [ContentItemsController::class, 'uploadEditorImage'])->name('editor.upload-image');
    Route::resource('/struktur-organisasi-item', StrukturOrganisasiItemsController::class)->names('tentang.struktur-organisasi');

    // SDM (Pegawai) routes
    Route::resource('/pegawai', PegawaiController::class)->names('tentang.pegawai');

    // Unit Organisasi routes (nested under struktur)
    Route::get('/struktur-organisasi/{struktur}/unit', [UnitOrganisasiController::class, 'index'])->name('tentang.unit-organisasi.index');
    Route::post('/unit-organisasi', [UnitOrganisasiController::class, 'store'])->name('tentang.unit-organisasi.store');
    Route::get('/unit-organisasi/{unit}', [UnitOrganisasiController::class, 'show'])->name('tentang.unit-organisasi.show');
    Route::put('/unit-organisasi/{unit}', [UnitOrganisasiController::class, 'update'])->name('tentang.unit-organisasi.update');
    Route::delete('/unit-organisasi/{unit}', [UnitOrganisasiController::class, 'destroy'])->name('tentang.unit-organisasi.destroy');
    Route::post('/unit-organisasi/update-order', [UnitOrganisasiController::class, 'updateOrder'])->name('tentang.unit-organisasi.update-order');

    // Pilar Transformasi routes
    Route::resource('/pilar-transformasi', PilarTransformasiController::class)->names('tentang.pilar-transformasi');

    // Program Kerja Admin routes
    Route::get('/program-kerja/pilars', [AdminProgramKerjaController::class, 'getPilarsByPeriode'])->name('tentang.program-kerja.pilars');
    Route::resource('/program-kerja', AdminProgramKerjaController::class)->names('tentang.program-kerja');
});

require __DIR__ . '/auth.php';
