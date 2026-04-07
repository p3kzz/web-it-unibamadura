<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Policy extends Model
{
    use HasFactory;

    protected $table = 'policies';

    protected $fillable = [
        'policy_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Policy $policy) {
            if (empty($policy->slug)) {
                $policy->slug = Str::slug($policy->title);
            }
        });

        static::updating(function (Policy $policy) {
            if ($policy->isDirty('title') && !$policy->isDirty('slug')) {
                $policy->slug = Str::slug($policy->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PolicyCategory::class, 'policy_category_id');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
