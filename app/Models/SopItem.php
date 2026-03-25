<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SopItem extends Model
{
    use HasFactory;

    protected $table = 'sop_items';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file);
    }
}
