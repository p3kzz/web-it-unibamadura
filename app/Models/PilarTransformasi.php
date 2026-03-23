<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilarTransformasi extends Model
{
    use HasFactory;

    protected $table = 'pilar_transformasi';

    protected $fillable = [
        'periode_id',
        'title',
        'subtitle',
        'description',
        'key_components',
        'is_active',
    ];

    protected $casts = [
        'key_components' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function programKerja()
    {
        return $this->hasMany(ProgramKerja::class, 'pilar_id');
    }
}
