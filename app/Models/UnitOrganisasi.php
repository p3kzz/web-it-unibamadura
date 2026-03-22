<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'unit_organisasi';

    protected $fillable = [
        'struktur_organisasi_id',
        'name',
        'parent_id',
        'type',
        'description',
    ];

    /**
     * Get the struktur organisasi that owns the unit.
     */
    public function struktur(): BelongsTo
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'struktur_organisasi_id');
    }

    /**
     * Get the parent unit.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(UnitOrganisasi::class, 'parent_id');
    }

    /**
     * Get the child units (subdirectorates).
     */
    public function children(): HasMany
    {
        return $this->hasMany(UnitOrganisasi::class, 'parent_id');
    }

    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * Get the subdirectorates.
     */
    public function subdirectorates(): HasMany
    {
        return $this->children()->where('type', 'subdirectorate');
    }

    /**
     * Scope for directorates only.
     */
    public function scopeDirectorates($query)
    {
        return $query->where('type', 'directorate');
    }

    /**
     * Scope for subdirectorates only.
     */
    public function scopeSubdirectorates($query)
    {
        return $query->where('type', 'subdirectorate');
    }

    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Check if unit is a directorate.
     */
    public function isDirectorate(): bool
    {
        return $this->type === 'directorate';
    }

    /**
     * Check if unit is a subdirectorate.
     */
    public function isSubdirectorate(): bool
    {
        return $this->type === 'subdirectorate';
    }

    /**
     * Get employees assigned to this unit.
     */
    public function pegawai(): BelongsToMany
    {
        return $this->belongsToMany(
            Pegawai::class,
            'penugasan_pegawai',
            'unit_organisasi_id',
            'pegawai_id'
        )->withPivot(['is_primary', 'tanggal_mulai', 'tanggal_selesai'])
            ->withTimestamps();
    }

    /**
     * Get active employees assigned to this unit.
     */
    public function pegawaiAktif(): BelongsToMany
    {
        return $this->pegawai()
            ->where('status', 'aktif')
            ->wherePivotNull('tanggal_selesai');
    }
}
