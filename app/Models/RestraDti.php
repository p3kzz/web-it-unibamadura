<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestraDti extends Model
{
    use HasFactory;

    protected $table = 'restra_dti';

    protected $fillable = [
        'judul',
        'year',
        'deskripsi',
        'file',
        'is_active',
    ];

    protected $casts = [
        'year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }

    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file);
    }
}
