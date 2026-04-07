<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Models\PolicyCategory;
use App\Services\Admin\Penjaminan\Policy\PolicyQueryService;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function __construct(
        private readonly PolicyQueryService $policyQuery
    ) {}

    public function index()
    {
        $categories = $this->policyQuery->getCategoriesWithActivePolicies();

        return view('pages.kebijakan.index', compact('categories'));
    }

    public function category(string $slug)
    {
        $category = PolicyCategory::query()
            ->with(['activePolicies' => fn($q) => $q->latest()])
            ->where('slug', $slug)
            ->firstOrFail();

        $otherCategories = PolicyCategory::query()
            ->whereHas('activePolicies')
            ->where('id', '!=', $category->id)
            ->orderBy('name')
            ->get();

        return view('pages.kebijakan.category', compact('category', 'otherCategories'));
    }

    public function show(string $slug)
    {
        $policy = $this->policyQuery->findActivePolicyBySlug($slug);

        if (!$policy) {
            abort(404, 'Kebijakan tidak ditemukan');
        }

        $relatedPolicies = $policy->category
            ->activePolicies()
            ->where('id', '!=', $policy->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('pages.kebijakan.show', compact('policy', 'relatedPolicies'));
    }
}
