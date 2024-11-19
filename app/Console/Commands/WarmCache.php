<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{Category, Product};

class WarmCache extends Command
{
    protected $signature = 'cache:warm';
    protected $description = 'Warm up the cache with frequently accessed data';

    public function handle()
    {
        $this->info('Warming up cache...');

        // Cache categories
        $categories = Category::withCount('products')->get();
        cache()->put('categories', $categories, now()->addDay());

        // Cache featured products
        $featuredProducts = Product::with('category')
            ->where('is_available', true)
            ->latest()
            ->take(8)
            ->get();
        cache()->put('featured_products', $featuredProducts, now()->addHours(6));

        // Cache site settings
        $settings = config('site_settings');
        cache()->put('site_settings', $settings, now()->addDay());

        $this->info('Cache warmed up successfully!');
    }
}
