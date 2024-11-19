<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        if ($this->app->environment('production')) {
            // Enable HTTP/2 Server Push
            // $this->app['router']->middleware('web')->pushMiddleware(\App\Http\Middleware\HttpPush::class);

            // // Enable response compression
            // $this->app['router']->middleware('web')->pushMiddleware(\App\Http\Middleware\CompressResponse::class);

            // Disable debugbar
            // \Debugbar::disable();
        }
        Paginator::defaultView('pagination::semantic-ui');
        $this->app->resolving(Paginator::class, function ($paginator) {
            return $paginator->withQueryString();
        });
    }
}
