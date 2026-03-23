<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'title',
        'organization',
        'description',
        'achievement_date',
        'year',
        'image',
        'is_active',
    ];

    protected $casts = [
        'achievement_date' => 'date',
        'year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }
}
