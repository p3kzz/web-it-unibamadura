<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiItem extends Model
{
    use HasFactory;
    protected $table = 'visi_misi_items';
    protected $fillable = [
        'section',
        'title',
        'content',
        'is_active',
    ];

    public function scopeVisi(Builder $query)
    {
        return $query->where('section', 'visi');
    }

    public function scopeMisi(Builder $query)
    {
        return $query->where('section', 'misi');
    }

    public function scopeTujuan(Builder $query)
    {
        return $query->where('section', 'tujuan');
    }

    public function scopeSasaran(Builder $query)
    {
        return $query->where('section', 'sasaran');
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

}
