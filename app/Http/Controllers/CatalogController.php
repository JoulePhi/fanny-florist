<?php

namespace App\Http\Controllers;

use App\Models\{Category, Product};
use App\Services\ProductSortingService;
use App\Services\SeoService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService,)
    {
        $this->seoService = $seoService;
    }

    public function index(Request $request, ProductSortingService $sortingService)
    {

        $categories = Category::withCount('products')->get();
        $query = Product::with('category')->where('is_available', true);
        $sort = $request->query('sort', 'latest');

        $query = $sortingService->apply($query, $sort);

        $products = $query->paginate(12);

        $seo = [
            'title' => 'Koleksi Bunga Terbaik - ' . config('site_settings.company_name'),
            'description' => 'Jelajahi koleksi bunga segar, karangan bunga, dan rangkaian bunga kami. Sempurna untuk setiap kesempatan.',
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
            'description' => $category->meta_description ?? "Jelajahi koleksi {$category->name} kami. Sempurna untuk setiap kesempatan.",
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
            'description' => $product->meta_description ?? "Beli {$product->name} di " . config('site_settings.company_name') . ". Tersedia untuk pengiriman.",
            'schema' => $this->seoService->getProductSchema($product)
        ];


        return view('pages.catalog.product', compact('category', 'product', 'relatedProducts', 'breadcrumbs', 'seo'));
    }
}
