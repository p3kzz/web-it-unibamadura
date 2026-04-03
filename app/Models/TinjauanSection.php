<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinjauanSection extends Model
{
    use HasFactory;
    protected $table = 'tinjauan_section';
    protected $fillable = [
        'tinjauan_manajemen_id',
        'title',
        'content',
    ];

    public function tinjauanManajemen()
    {
        return $this->belongsTo(TinjauanManajemen::class, 'tinjauan_manajemen_id');
    }
}
