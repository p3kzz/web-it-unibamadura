<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebHosting extends Model
{
    use HasFactory;
    protected $table = 'web_hostings';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_active',
    ];

    public function sections()
    {
        return $this->hasMany(HostingSection::class);
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
