<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingFooter extends Model
{
    use HasFactory;
    protected $table = 'setting_footer';
    protected $fillable = [
        'type',
        'nama',
        'url',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeTautanCepat($query)
    {
        return $query->where('type', 'tautan cepat');
    }

    public function scopeSosialMedia($query)
    {
        return $query->where('type', 'sosial media');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
