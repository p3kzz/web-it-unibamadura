<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingSection extends Model
{
    use HasFactory;
    protected $table = 'hosting_sections';
    protected $fillable = [
        'web_hosting_id',
        'title',
        'content',
    ];

    public function hosting()
    {
        return $this->belongsTo(WebHosting::class, 'web_hosting_id');
    }
}

