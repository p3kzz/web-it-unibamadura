<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAkun extends Model
{
    use HasFactory;
    protected $table = 'email_akuns';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_active',
    ];

    public function sections()
    {
        return $this->hasMany(SectionEmailAkun::class);
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
