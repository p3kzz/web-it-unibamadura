<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogLayanan extends Model
{
    use HasFactory;
    protected $table = 'katalog_layanan';

    protected $fillable = [
        'kategori_layanan_id',
        'nama',
        'deskripsi',
        'pengguna_sasaran',
        'service_owner',
        'jam_layanan',
        'sla',
        'biaya',
        'cara_akses',
        'status',
        'dependencies',
        'kontak',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategori_layanan_id');
    }
}
