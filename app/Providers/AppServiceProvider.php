<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\WelcomeService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Nette\Schema\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        $this->app->bind('brand', function () {
            return new BrandService();
        });

        $this->app->bind('hello', function () {
            return new WelcomeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        paginator::useBootstrapFive();
    }
}
