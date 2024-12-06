<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
            ->with(['products' => function ($query) {
                $query->select('id', 'category_id', 'images')
                    ->whereNotNull('images')
                    ->where('images', '!=', '[]')
                    ->inRandomOrder()
                    ->take(1);
            }])
            ->having('products_count', '>', 0)
            ->latest()
            ->paginate(12);

        $seo = [
            'title' => 'Kategori Bunga & Rangkaian - ' . config('site_settings.company_name'),
            'description' => 'Temukan berbagai kategori bunga dan rangkaian untuk setiap momen spesial Anda. Tersedia untuk acara pernikahan, wisuda, ulang tahun, duka cita, dan berbagai kesempatan lainnya.',
            'schema' => $this->getCategoriesSchema($categories)
        ];

        return view('pages.categories.index', compact('categories', 'seo'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->withCount('products')
            ->firstOrFail();

        $products = $category->products()->paginate(12);

        $seo = [
            'title' => $category->name . ' - ' . config('site_settings.company_name'),
            'description' => $category->description ?? "Jelajahi koleksi {$category->name} terbaik kami. Tersedia berbagai pilihan dengan pengiriman cepat dan garansi kualitas.",
            'schema' => $this->getCategoryDetailSchema($category, $products),
            'canonical' => route('categories.show', $slug)
        ];

        return view('pages.categories.show', compact('category', 'products', 'seo'));
    }



    private function getCategoryDetailSchema($category, $products)
    {
        $baseUrl = config('app.url');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $category->name,
            'description' => $category->description,
            'url' => route('categories.show', $category->slug),
            'numberOfItems' => $category->products_count,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => $baseUrl
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Categories',
                        'item' => route('categories.index')
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => $category->name,
                        'item' => route('categories.show', $category->slug)
                    ]
                ]
            ],
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $products->map(function ($product, $index) {
                    $rating = $product->reviews->first()?->average_rating;

                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'item' => [
                            '@type' => 'Product',
                            'name' => $product->name,
                            'description' => $product->description,
                            'image' => $product->images[0] ?? null,
                            'url' => route('products.show', $product->slug),
                            'sku' => $product->id,
                            'offers' => [
                                '@type' => 'Offer',
                                'price' => $product->price,
                                'priceCurrency' => 'IDR',
                                'availability' => 'https://schema.org/InStock',
                                'seller' => [
                                    '@type' => 'Organization',
                                    'name' => config('site_settings.company_name')
                                ]
                            ],
                            'aggregateRating' => $rating ? [
                                '@type' => 'AggregateRating',
                                'ratingValue' => number_format($rating, 1),
                                'reviewCount' => $product->reviews->count()
                            ] : null
                        ]
                    ];
                })->toArray()
            ]
        ];
    }

    private function getCategoriesSchema($categories)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'itemListElement' => $categories->map(function ($category, $index) {
                return [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'item' => [
                        '@type' => 'Product',
                        'name' => $category->name,
                        'description' => $category->description ?? "Koleksi {$category->name} terbaik",
                        'url' => route('categories.show', $category->slug),
                        'image' => $category->products->first()?->images[0] ?? null,
                        'numberOfItems' => $category->products_count,
                        'offers' => [
                            '@type' => 'AggregateOffer',
                            'availability' => 'https://schema.org/InStock',
                            'priceCurrency' => 'IDR',
                            'seller' => [
                                '@type' => 'Organization',
                                'name' => config('site_settings.company_name')
                            ]
                        ]
                    ]
                ];
            })->toArray(),
            'numberOfItems' => $categories->count(),
            'provider' => [
                '@type' => 'Organization',
                'name' => config('site_settings.company_name'),
                'url' => config('app.url')
            ]
        ];
    }
}
