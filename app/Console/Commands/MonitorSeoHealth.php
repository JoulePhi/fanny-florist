<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\{Product, Category};

class MonitorSeoHealth extends Command
{
    protected $signature = 'seo:monitor';
    protected $description = 'Monitor SEO health of the website';

    public function handle()
    {
        $this->info('Starting SEO health check...');

        // Check products
        $products = Product::all();
        foreach ($products as $product) {
            if (strlen($product->meta_title) > 60) {
                $this->warn("Product {$product->id}: Meta title too long");
            }
            if (strlen($product->meta_description) > 160) {
                $this->warn("Product {$product->id}: Meta description too long");
            }
            if (empty($product->meta_title) || empty($product->meta_description)) {
                $this->warn("Product {$product->id}: Missing meta tags");
            }
        }

        // Check categories
        $categories = Category::all();
        foreach ($categories as $category) {
            if (strlen($category->meta_title) > 60) {
                $this->warn("Category {$category->id}: Meta title too long");
            }
            if (strlen($category->meta_description) > 160) {
                $this->warn("Category {$category->id}: Meta description too long");
            }
        }

        $this->info('SEO health check completed!');
    }
}
