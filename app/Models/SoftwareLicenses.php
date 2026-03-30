<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareLicenses extends Model
{
    use HasFactory;
    protected $table = 'software_licenses';
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
