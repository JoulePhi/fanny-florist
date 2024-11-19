<?php

namespace App\Http\Controllers;

use App\Models\SurplusProduct;
use Carbon\Carbon;

class SurplusController extends Controller
{
    public function index()
    {
        $surplusProducts = SurplusProduct::where('is_active', true)
            ->where('expires_at', '>', Carbon::now())
            ->where('quantity', '>', 0)
            ->latest()
            ->paginate(12);

        $seo = [
            'title' => 'Flash Sale - Special Offers | ' . config('site_settings.company_name'),
            'description' => 'Get fresh flowers at discounted prices. Limited time offers on beautiful floral arrangements.',
            'schema' => $this->getSurplusSchema($surplusProducts)
        ];

        return view('pages.surplus', compact('surplusProducts', 'seo'));
    }

    private function getSurplusSchema($products)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'SpecialAnnouncement',
            'name' => 'Flash Sale on Fresh Flowers',
            'text' => 'Limited time offers on beautiful floral arrangements',
            'datePosted' => now()->toIso8601String(),
            'expires' => $products->first()->expires_at->toIso8601String(),
            'category' => 'https://schema.org/SaleEvent',
            'offers' => $products->map(function ($product) {
                return [
                    '@type' => 'Offer',
                    'name' => $product->name,
                    'price' => $product->discount_price,
                    'priceCurrency' => 'IDR',
                    'availability' => $product->quantity > 0 ? 'InStock' : 'OutOfStock',
                    'validFrom' => $product->created_at->toIso8601String(),
                    'validThrough' => $product->expires_at->toIso8601String(),
                ];
            })->toArray()
        ];
    }
}
