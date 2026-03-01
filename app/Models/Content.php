<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $fillable = [
        'title',
        'slug',
        'type',
        'excerpt',
        'content',
        'thumbnail',
        'status',
        'published_at',
        'event_date',
        'location',
        'user_id',
        'views',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'event_date' => 'date',
        'views' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }

    public function scopeAnnouncements($query)
    {
        return $query->where('type', 'announcements');
    }

    public function scopeAgendas($query)
    {
        return $query->where('type', 'agenda');
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail
            ? asset('storage/' . $this->thumbnail)
            : asset('images/default-thumbnail.jpg');
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
