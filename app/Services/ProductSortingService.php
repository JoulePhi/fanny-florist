<?php

namespace App\Services;

class ProductSortingService
{
    public function apply($query, $sort)
    {
        switch ($sort) {
            case 'price_low':
                return $query->orderBy('price', 'asc');
            case 'price_high':
                return $query->orderBy('price', 'desc');
            case 'name_asc':
                return $query->orderBy('name', 'asc');
            case 'name_desc':
                return $query->orderBy('name', 'desc');
            case 'oldest':
                return $query->oldest();
            default:
                return $query->latest();
        }
    }
}
