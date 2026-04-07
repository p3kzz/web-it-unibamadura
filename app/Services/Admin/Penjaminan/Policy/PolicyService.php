<?php

namespace App\Services\Admin\Penjaminan\Policy;

use App\Models\Policy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PolicyService
{
    public function store(array $data): Policy
    {
        return DB::transaction(function () use ($data) {
            return Policy::create([
                'policy_category_id' => $data['policy_category_id'],
                'title' => $data['title'],
                'slug' => $data['slug'] ?? Str::slug($data['title']),
                'excerpt' => $data['excerpt'] ?? null,
                'content' => $data['content'],
                'is_active' => $data['is_active'] ?? true,
            ]);
        });
    }

    public function update(Policy $policy, array $data): Policy
    {
        return DB::transaction(function () use ($policy, $data) {
            $policy->update([
                'policy_category_id' => $data['policy_category_id'],
                'title' => $data['title'],
                'slug' => $data['slug'] ?? $policy->slug,
                'excerpt' => $data['excerpt'] ?? $policy->excerpt,
                'content' => $data['content'],
                'is_active' => $data['is_active'] ?? $policy->is_active,
            ]);

            return $policy->refresh();
        });
    }

    public function delete(Policy $policy): void
    {
        DB::transaction(function () use ($policy) {
            $policy->delete();
        });
    }
}
