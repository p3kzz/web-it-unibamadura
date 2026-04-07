<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
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

        return view('pages.penjaminan-mutu.policy.index', compact('categories'));
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

        return view('pages.penjaminan-mutu.policy.show', compact('policy', 'relatedPolicies'));
    }
}
