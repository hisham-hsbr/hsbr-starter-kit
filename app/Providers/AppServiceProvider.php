<?php

namespace App\Providers;

use App\Models\HakModels\Settings;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        $bootSettings = Settings::all()->pluck('value', 'name');
        View::share('bootSettings', $bootSettings);
    }
}
