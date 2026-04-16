<?php

namespace App\Providers;

use App\View\Composers\KonfigurasiFooterComposer;
use App\View\Composers\KonfigurasiLogoComposer;
use App\View\Composers\PolicyNavComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
            'partials.navbar.dropdown-kebijakan',
            PolicyNavComposer::class
        );

        View::composer(
            'partials.navbar',
            KonfigurasiLogoComposer::class
        );

        View::composer(
            'partials.footer',
            KonfigurasiFooterComposer::class
        );
    }
}
