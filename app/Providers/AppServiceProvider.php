<?php

namespace App\Providers;

// use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Filament::serving(function () {
        //     Filament::registerNavigationGroups([
        //         'Crowd Fund',
        //         'Greenhouse',
        //         'Ecommerce',
        //         'User Management',
        //         'Agronomist',
        //         'Farm Management'
        //     ]);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
