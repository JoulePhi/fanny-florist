<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductSortingService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductSortingService::class, function ($app) {
            return new ProductSortingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
