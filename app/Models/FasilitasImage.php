<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FasilitasImage extends Model
{
    protected $table = 'fasilitas_images';

    protected $fillable = [
        'fasilitas_id',
        'image',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
