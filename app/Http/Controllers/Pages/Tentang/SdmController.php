<?php

namespace App\Http\Controllers\Pages\Tentang;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\StrukturOrganisasi;

class SdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get active struktur organisasi
        $struktur = StrukturOrganisasi::where('is_active', true)->first();

        // Get active pegawai with their current unit assignments
        $pegawaiList = Pegawai::with(['penugasan' => function ($q) {
            $q->where('is_primary', true)
                ->whereNull('tanggal_selesai')
                ->with('unitOrganisasi');
        }])
            ->where('status', 'aktif')
            ->orderBy('nama')
            ->get();

        // Calculate statistics
        $totalPegawai = $pegawaiList->count();
        $totalSertifikasi = $pegawaiList->sum(function ($p) {
            return is_array($p->sertifikasi) ? count($p->sertifikasi) : 0;
        });

        return view('pages.tentang.sdm', compact(
            'pegawaiList',
            'totalPegawai',
            'totalSertifikasi',
            'struktur'
        ));
    }
}
