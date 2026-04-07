<?php

namespace App\Services\Admin\Penjaminan\Policy;

use App\Models\PolicyCategory;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PolicyCategoryService
{
    public function getCategories(array $filters): Paginator
    {
        return PolicyCategory::query()
            ->withCount('policies')
            ->when($filters['search'] ?? null, function ($q) use ($filters) {
                $search = $filters['search'];
                $q->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->simplePaginate(10)
            ->withQueryString();
    }

    public function getAllCategories(): Collection
    {
        return PolicyCategory::query()
            ->orderBy('name')
            ->get();
    }

    public function store(array $data): PolicyCategory
    {
        return DB::transaction(function () use ($data) {
            return PolicyCategory::create([
                'name' => $data['name'],
                'slug' => $data['slug'] ?? Str::slug($data['name']),
            ]);
        });
    }

    public function update(PolicyCategory $category, array $data): PolicyCategory
    {
        return DB::transaction(function () use ($category, $data) {
            $category->update([
                'name' => $data['name'],
                'slug' => $data['slug'] ?? $category->slug,
            ]);

            return $category->refresh();
        });
    }

    public function delete(PolicyCategory $category): void
    {
        DB::transaction(function () use ($category) {
            $category->delete();
        });
    }

    public function findById(int $id): ?PolicyCategory
    {
        return PolicyCategory::find($id);
    }
}
