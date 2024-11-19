<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Rose Bouquet',
                'slug' => Str::slug('Rose Bouquet'),
                'description' => 'A beautiful bouquet of fresh roses.',
                'price' => 29.99,
                'is_available' => 1,
                'meta_title' => 'Rose Bouquet',
                'meta_description' => 'Buy a beautiful bouquet of fresh roses.',
                'images' => json_encode(['rose1.jpg', 'rose2.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Red Roses',
                'slug' => Str::slug('Red Roses'),
                'description' => 'A bouquet of beautiful red roses.',
                'price' => 19.99,
                'is_available' => 1,
                'meta_title' => 'Red Roses',
                'meta_description' => 'A bouquet of beautiful red roses.',
                'images' => json_encode(['red_roses1.jpg', 'red_roses2.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Indoor Plant',
                'slug' => Str::slug('Indoor Plant'),
                'description' => 'A lush indoor plant to brighten your home.',
                'price' => 24.99,
                'is_available' => 1,
                'meta_title' => 'Indoor Plant',
                'meta_description' => 'A lush indoor plant to brighten your home.',
                'images' => json_encode(['indoor_plant1.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Gift Basket',
                'slug' => Str::slug('Gift Basket'),
                'description' => 'A basket filled with delightful gifts.',
                'price' => 49.99,
                'is_available' => 1,
                'meta_title' => 'Gift Basket',
                'meta_description' => 'A basket filled with delightful gifts.',
                'images' => json_encode(['gift_basket1.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Mixed Bouquet',
                'slug' => Str::slug('Mixed Bouquet'),
                'description' => 'A bouquet of mixed flowers.',
                'price' => 34.99,
                'is_available' => 1,
                'meta_title' => 'Mixed Bouquet',
                'meta_description' => 'A bouquet of mixed flowers.',
                'images' => json_encode(['mixed_bouquet1.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Vase',
                'slug' => Str::slug('Vase'),
                'description' => 'A decorative vase for your flowers.',
                'price' => 14.99,
                'is_available' => 1,
                'meta_title' => 'Vase',
                'meta_description' => 'A decorative vase for your flowers.',
                'images' => json_encode(['vase1.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ],



        ]);
    }
}
