<?php

namespace App\View\Composers;

use App\Models\Policy;
use Illuminate\View\View;

class PolicyNavComposer
{
    public function compose(View $view): void
    {
        $policies = Policy::query()
            ->active()
            ->orderBy('title')
            ->get(['id', 'title', 'slug']);

        $view->with('navPolicies', $policies);
    }
}
