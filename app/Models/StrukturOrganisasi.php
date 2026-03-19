<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'periode_id',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the periode that owns the struktur organisasi.
     */
    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class);
    }

    /**
     * Get the unit organisasi for the struktur organisasi.
     */
    public function unitOrganisasi(): HasMany
    {
        return $this->hasMany(UnitOrganisasi::class, 'struktur_organisasi_id');
    }

    /**
     * Get only directorates (top-level units).
     */
    public function directorates(): HasMany
    {
        return $this->hasMany(UnitOrganisasi::class, 'struktur_organisasi_id')
            ->where('type', 'directorate')
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    /**
     * Get the image URL attribute.
     */
    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default-struktur.png');
    }

    /**
     * Scope to get only active struktur.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
