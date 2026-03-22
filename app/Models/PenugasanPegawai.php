<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenugasanPegawai extends Model
{
    use HasFactory;

    protected $table = 'penugasan_pegawai';

    protected $fillable = [
        'pegawai_id',
        'unit_organisasi_id',
        'is_primary',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function unitOrganisasi(): BelongsTo
    {
        return $this->belongsTo(UnitOrganisasi::class);
    }

    /**
     * Scope for active assignments (no end date).
     */
    public function scopeAktif($query)
    {
        return $query->whereNull('tanggal_selesai');
    }

    /**
     * Scope for primary assignments.
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }
}
