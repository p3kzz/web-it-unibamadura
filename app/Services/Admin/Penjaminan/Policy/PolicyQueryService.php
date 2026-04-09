<?php

namespace App\Services\Admin\Penjaminan\Policy;

use App\Models\Policy;
use App\Models\PolicyCategory;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class PolicyQueryService
{
    public function getPolicies(array $filters): Paginator
    {
        return Policy::query()
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getActivePolicies(int $limit = null): Collection
    {
        return Policy::query()
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function findPolicyBySlug(string $slug): ?Policy
    {
        return Policy::query()
            ->where('slug', $slug)
            ->first();
    }

    public function findActivePolicyBySlug(string $slug): ?Policy
    {
        return Policy::query()
            ->active()
            ->where('slug', $slug)
            ->first();
    }

    public function findById(int $id): ?Policy
    {
        return Policy::find($id);
    }

    public function getAllActivePolicies()
{
    return Policy::query()
        ->where('is_active', true)
        ->latest()
        ->get();
}
public function getRelatedPolicies(int $excludeId, int $limit = 5)
{
    return Policy::query()
        ->where('is_active', true)
        ->where('id', '!=', $excludeId)
        ->latest()
        ->limit($limit)
        ->get();
}
}
