<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->where('is_available', true)
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->take(6)
            ->get();

        $seo = [
            'title' => config('site_settings.company_name') . ' - Fresh Flowers & Arrangements',
            'description' => 'Discover beautiful fresh flowers and floral arrangements at ' . config('site_settings.company_name') . '. Same-day delivery available in ' . config('site_settings.location'),
            'schema' => $this->getHomeSchema(),
        ];

        return view('pages.home', compact('featuredProducts', 'categories', 'seo'));
    }

    private function getHomeSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FlowerShop',
            'name' => config('site_settings.company_name'),
            'description' => config('site_settings.about_us'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => config('site_settings.address'),
                'addressLocality' => config('site_settings.city'),
                'addressRegion' => config('site_settings.state'),
                'postalCode' => config('site_settings.postal_code'),
                'addressCountry' => 'ID'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => config('site_settings.latitude'),
                'longitude' => config('site_settings.longitude')
            ],
            'openingHours' => config('site_settings.opening_hours'),
            'telephone' => config('site_settings.phone'),
            'url' => url('/')
        ];
    }
}
