<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $path = "datas/";
        $path .= "bunga_meja.csv";
        $file_handle = fopen(asset($path), 'r');
        $category_id = 8;
        while ($csvRow = fgetcsv($file_handle, null, ',')) {
            $image = file_get_contents($csvRow[2]);
            $extension = pathinfo(parse_url($csvRow[2], PHP_URL_PATH), PATHINFO_EXTENSION);
            $imageName = Str::random(10) . '.' . $extension;
            \Illuminate\Support\Facades\Storage::disk('public')->put($imageName, $image);
            $price = str_replace('Rp', '', $csvRow[1]);
            $priceDecimal = str_replace('.', '', $price);
            $priceDecimal = str_replace(',', '.', $priceDecimal);

            $data =  [
                'category_id' => $category_id,
                'name' => $csvRow[0],
                'slug' => Str::slug($csvRow[0]),
                'description' => '',
                'price' => $priceDecimal,
                'is_available' => 1,
                'meta_title' => $csvRow[0],
                'meta_description' => '',
                'images' => json_encode([$imageName]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('products')->insert($data);
        }


        fclose($file_handle);
    }
}
