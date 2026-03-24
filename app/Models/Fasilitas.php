<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';

    protected $fillable = [
        'nama',
        'image',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default-fasilitas.png');
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(FasilitasImage::class, 'fasilitas_id')
                    ->orderBy('sort_order');
    }

    public function getAllImagesAttribute(): array
    {
        $images = [];

        if ($this->image) {
            $images[] = [
                'url' => $this->image_url,
                'path' => $this->image,
                'is_main' => true,
            ];
        }

        foreach ($this->galleryImages as $galleryImage) {
            $images[] = [
                'url' => $galleryImage->image_url,
                'path' => $galleryImage->image,
                'id' => $galleryImage->id,
                'is_main' => false,
            ];
        }

        return $images;
    }
}
