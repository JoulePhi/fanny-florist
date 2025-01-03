<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product};
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        // Create new sitemap
        $sitemap = Sitemap::create();

        // Add routes
        $sitemap->add(Url::create('/')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(1.0));

        $sitemap->add(Url::create('/catalog')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.9));

        $sitemap->add(Url::create('/contact')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));

        $sitemap->add(Url::create('/faq')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));

        // Add categories
        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create("/catalog/{$category->slug}")
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        // Add products
        Product::with('category')->get()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(Url::create("/catalog/{$product->category->slug}/{$product->slug}")
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        });

        // Clear any output buffering
        if (ob_get_level()) {
            ob_end_clean();
        }

        // Return response with proper headers
        return response($sitemap->render())
            ->header('Content-Type', 'text/xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
