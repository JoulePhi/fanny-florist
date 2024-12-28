<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Faq;
use App\Models\Testimonial;

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
            ->with(['products' => function ($query) {
                $query->select('id', 'category_id', 'images')
                    ->whereNotNull('images')
                    ->where('images', '!=', '[]')
                    ->inRandomOrder()
                    ->take(1);
            }])
            ->having('products_count', '>', 0)
            ->take(6)
            ->get();

        $features = Feature::all();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();

        $seo = [
            'title' => config('site_settings.company_name') . ' - ' . config('site_settings.tagline'),
            'description' => 'Toko bunga terbaik di kota Bandung. Menyediakan berbagai macam rangkaian bunga segar untuk berbagai acara.',
            'schema' => $this->getHomeSchema(),
        ];

        return view('pages.home', compact('featuredProducts', 'categories', 'seo', 'features', 'faqs', 'testimonials'));
    }

    private function getHomeSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Toko Bunga',
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
