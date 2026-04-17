<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogLayanan extends Model
{
    use HasFactory;
    protected $table = 'katalog_layanan';

    protected $fillable = [
        'kode',
        'nama',
        'icon',
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

    public function getIconUrlAttribute()
    {
        return $this->icon ? asset('storage/' . $this->icon) : null;
    }

}
