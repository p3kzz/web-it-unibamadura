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
        'type',
        'content',
        'order',
        'is_active',
    ];

    public function scopeVisi(Builder $query)
    {
        return $query->where('type', 'visi');
    }

    public function scopeMisi(Builder $query)
    {
        return $query->where('type', 'misi');
    }

    public function scopeTujuan(Builder $query)
    {
        return $query->where('type', 'tujuan');
    }

    public function scopeSasaran(Builder $query)
    {
        return $query->where('type', 'sasaran');
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query)
    {
        return $query->orderBy('order');
    }
}
