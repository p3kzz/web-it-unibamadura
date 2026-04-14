<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiLogo extends Model
{
    use HasFactory;
    protected $table = 'setting_web';
    protected $fillable = [
        'logo_web',
        'nama_web',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getLogoWebUrlAttribute()
    {
        return $this->logo_web ? asset('storage/' . $this->logo_web) : null;
    }
}
