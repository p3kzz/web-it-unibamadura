<?php

namespace App\Http\Controllers\Pages\Penjaminan;

use App\Http\Controllers\Controller;
use App\Services\Admin\Penjaminan\Policy\PolicyQueryService;

class PolicyController extends Controller
{
    public function __construct(
        private readonly PolicyQueryService $policyQuery
    ) {}

    /**
     * Halaman list kebijakan
     */
    public function index()
    {
        $policies = $this->policyQuery->getAllActivePolicies();

        return view('pages.kebijakan.index', compact('policies'));
    }

    /**
     * Detail kebijakan
     */
    public function show(string $slug)
    {
        $policy = $this->policyQuery->findActivePolicyBySlug($slug);

        if (!$policy) {
            abort(404, 'Kebijakan tidak ditemukan');
        }

        $relatedPolicies = $this->policyQuery->getRelatedPolicies($policy->id);

        return view('pages.kebijakan.show', compact('policy', 'relatedPolicies'));
    }

}
