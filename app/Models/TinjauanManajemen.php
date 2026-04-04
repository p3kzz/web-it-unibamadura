<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinjauanManajemen extends Model
{
    use HasFactory;
    protected $table = 'tinjauan_manajemens';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_active',
    ];

    public function sections()
    {
        return $this->hasMany(TinjauanSection::class, 'tinjauan_manajemen_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
