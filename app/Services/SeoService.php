<?php

namespace App\Services;

class SeoService
{
    public function getProductSchema($product)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->images,
            'offers' => [
                '@type' => 'Offer',
                'price' => $product->price,
                'priceCurrency' => 'IDR',
                'availability' => $product->is_available ? 'InStock' : 'OutOfStock'
            ]
        ];
    }

    public function getCategorySchema($category)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => $category->name,
            'description' => $category->description
        ];
    }

    public function getCatalogSchema()
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Flower Collection',
            'description' => 'Browse our collection of fresh flowers, bouquets, and floral arrangements. Perfect for any occasion.'
        ];
    }
}
