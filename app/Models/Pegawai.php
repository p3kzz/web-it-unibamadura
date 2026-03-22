<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'foto',
        'jabatan',
        'sertifikasi',
        'status',
    ];

    protected $casts = [
        'sertifikasi' => 'array',
    ];

    /**
     * Get all unit assignments.
     */
    public function penugasan(): HasMany
    {
        return $this->hasMany(PenugasanPegawai::class);
    }

    /**
     * Get units through assignments (many-to-many).
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(
            UnitOrganisasi::class,
            'penugasan_pegawai',
            'pegawai_id',
            'unit_organisasi_id'
        )->withPivot(['is_primary', 'tanggal_mulai', 'tanggal_selesai'])
            ->withTimestamps();
    }

    /**
     * Get primary unit for a specific struktur organisasi.
     */
    public function primaryUnitForStruktur(int $strukturId)
    {
        return $this->units()
            ->where('struktur_organisasi_id', $strukturId)
            ->wherePivot('is_primary', true)
            ->wherePivotNull('tanggal_selesai')
            ->first();
    }

    /**
     * Get current primary unit (active assignment).
     */
    public function currentUnit()
    {
        return $this->units()
            ->wherePivot('is_primary', true)
            ->wherePivotNull('tanggal_selesai')
            ->first();
    }

    /**
     * Photo URL accessor.
     */
    public function getFotoUrlAttribute(): string
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('images/default-avatar.png');
    }

    /**
     * Scope for active employees.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope to get employees with their assignments for a specific struktur.
     */
    public function scopeByStruktur($query, int $strukturId)
    {
        return $query->whereHas('penugasan', function ($q) use ($strukturId) {
            $q->whereNull('tanggal_selesai')
                ->whereHas('unitOrganisasi', function ($uq) use ($strukturId) {
                    $uq->where('struktur_organisasi_id', $strukturId);
                });
        });
    }

    /**
     * Scope to get employees by specific unit.
     */
    public function scopeByUnit($query, int $unitId)
    {
        return $query->whereHas('penugasan', function ($q) use ($unitId) {
            $q->where('unit_organisasi_id', $unitId)
                ->whereNull('tanggal_selesai');
        });
    }
}
