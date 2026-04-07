<?php

namespace App\View\Composers;

use App\Models\PolicyCategory;
use Illuminate\View\View;

class PolicyNavComposer
{
    public function compose(View $view): void
    {
        $policyCategories = PolicyCategory::query()
            ->whereHas('activePolicies')
            ->orderBy('name')
            ->get();

        $view->with('navPolicyCategories', $policyCategories);
    }
}
