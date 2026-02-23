<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
        'content',
        'extras',
        'order',
        'is_active',
    ];

    protected $casts = [
        'extras' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeIntro($query)
    {
        return $query->where('type', 'intro')->where('is_active', true);
    }

    public function scopeTimeline($query)
    {
        return $query->where('type', 'timeline')->where('is_active', true)->orderBy('order');
    }

    public function scopeVision($query)
    {
        return $query->where('type', 'vision')->where('is_active', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
