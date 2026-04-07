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
            ->with('category')
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            })
            ->when($filters['category_id'] ?? null, function ($q) use ($filters) {
                $q->where('policy_category_id', $filters['category_id']);
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getActivePolicies(int $limit = null): Collection
    {
        return Policy::query()
            ->with('category')
            ->active()
            ->latest()
            ->when($limit, fn($q) => $q->limit($limit))
            ->get();
    }

    public function getCategories(): Collection
    {
        return PolicyCategory::query()
            ->withCount(['policies', 'activePolicies'])
            ->orderBy('name')
            ->get();
    }

    public function getCategoriesWithActivePolicies(): Collection
    {
        return PolicyCategory::query()
            ->with(['activePolicies' => fn($q) => $q->latest()])
            ->whereHas('activePolicies')
            ->orderBy('name')
            ->get();
    }

    public function findPolicyBySlug(string $slug): ?Policy
    {
        return Policy::query()
            ->with('category')
            ->where('slug', $slug)
            ->first();
    }

    public function findActivePolicyBySlug(string $slug): ?Policy
    {
        return Policy::query()
            ->with('category')
            ->active()
            ->where('slug', $slug)
            ->first();
    }

    public function findById(int $id): ?Policy
    {
        return Policy::with('category')->find($id);
    }
}
