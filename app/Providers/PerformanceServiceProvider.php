<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class PerformanceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Cache common view components
        View::composer(['components.header', 'components.footer'], function ($view) {
            $cacheKey = 'site_settings_' . app()->getLocale();

            $settings = Cache::remember($cacheKey, 3600, function () {
                return [
                    'company_name' => config('site_settings.company_name'),
                    'contact_info' => config('site_settings.contact_info'),
                    'social_links' => config('site_settings.social_links'),
                    'categories' => \App\Models\Category::withCount('products')
                        ->having('products_count', '>', 0)
                        ->get()
                ];
            });

            $view->with($settings);
        });
    }
}
