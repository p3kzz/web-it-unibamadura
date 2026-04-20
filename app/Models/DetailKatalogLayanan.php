<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKatalogLayanan extends Model
{
    use HasFactory;
    protected $table = 'detail_katalog_layanan';
    protected $fillable = [
        'katalog_layanan_id',
        'title',
        'slug',
        'content',
    ];

    protected $casts = [
        'content' => 'json',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function katalogLayanan()
    {
        return $this->belongsTo(KatalogLayanan::class, 'katalog_layanan_id');
    }
}
