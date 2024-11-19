<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product};
use App\Services\SeoService;

class CatalogController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index()
    {
        $categories = Category::withCount('products')->get();
        $products = Product::with('category')
            ->where('is_available', true)
            ->latest()
            ->paginate(12);

        $seo = [
            'title' => 'Our Flower Collection - ' . config('site_settings.company_name'),
            'description' => 'Browse our collection of fresh flowers, bouquets, and floral arrangements. Perfect for any occasion.',
            'schema' => $this->seoService->getCatalogSchema()
        ];

        return view('pages.catalog.index', compact('categories', 'products', 'seo'));
    }

    public function category(Category $category)
    {
        $products = $category->products()
            ->where('is_available', true)
            ->latest()
            ->paginate(12);

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Catalog', 'url' => route('catalog')],
            ['name' => $category->name, 'url' => route('catalog.category', $category->slug)]
        ];

        $seo = [
            'title' => $category->meta_title ?? $category->name . ' - ' . config('site_settings.company_name'),
            'description' => $category->meta_description ?? "Browse our {$category->name} collection. Fresh and beautiful flowers available for delivery.",
            'schema' => $this->seoService->getCategorySchema($category)
        ];

        return view('pages.catalog.category', compact('category', 'products', 'breadcrumbs', 'seo'));
    }

    public function product(Category $category, Product $product)
    {
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->where('is_available', true)
            ->take(4)
            ->get();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Catalog', 'url' => route('catalog')],
            ['name' => $category->name, 'url' => route('catalog.category', $category->slug)],
            ['name' => $product->name, 'url' => route('catalog.product', [$category->slug, $product->slug])]
        ];

        $seo = [
            'title' => $product->meta_title ?? $product->name . ' - ' . config('site_settings.company_name'),
            'description' => $product->meta_description ?? "Buy {$product->name} from " . config('site_settings.company_name') . ". Fresh flowers available for delivery.",
            'schema' => $this->seoService->getProductSchema($product)
        ];

        return view('pages.catalog.product', compact('category', 'product', 'relatedProducts', 'breadcrumbs', 'seo'));
    }
}
