<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class PolicyCategory extends Model
{
    use HasFactory;

    protected $table = 'policy_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (PolicyCategory $category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function (PolicyCategory $category) {
            if ($category->isDirty('name') && !$category->isDirty('slug')) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class);
    }

    public function activePolicies(): HasMany
    {
        return $this->hasMany(Policy::class)->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
