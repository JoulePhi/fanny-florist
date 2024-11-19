<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Flowers', 'slug' => Str::slug('Flowers'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Plants', 'slug' => Str::slug('Plants'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gifts', 'slug' => Str::slug('Gifts'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bouquets', 'slug' => Str::slug('Bouquets'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Decor', 'slug' => Str::slug('Decor'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
