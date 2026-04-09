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
            $data['slug'] = $this->generateUniqueSlug($data['title']);
            return Policy::create($data);
        });
    }

    public function update(Policy $policy, array $data): Policy
    {
        return DB::transaction(function () use ($policy, $data) {
            if (isset($data['title']) && $data['title'] !== $policy->title) {
                $data['slug'] = $this->generateUniqueSlug($data['title'], $policy->id);
            }

            $policy->update($data);


            return $policy->refresh();
        });
    }

    public function delete(Policy $policy): void
    {
        DB::transaction(function () use ($policy) {
            $policy->delete();
        });
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;

        $count = 1;

        while (
            Policy::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }


        return $slug;
    }
}
