<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['name' => 'Iphone 11',
            'description' => 'This is iphone 11',
            'price' => 10000000,
            'category_id' => 2,
            'image_path'=>'iphone11.jpg'],
            ['name' => 'Iphone xr',
            'description' => 'This is iphone xr',
            'price' => 12000000,
            'category_id' => 2,
            'image_path'=> 'iphonexr.jpg'],
            ['name' => 'LG FHD TV Signage',
            'description' => 'This is LG FHD TV Signage',
            'price' => 11000000,
            'category_id' => 1,
            'image_path'=> 'LGFHDTVSignage.jpg'],
            ['name' => 'Rog Strix G15',
            'description' => 'This is Rog Strix G15',
            'price' => 22000000,
            'category_id' => 3,
            'image_path'=> 'rogstrixg15.jpg'],
            ['name' => 'Legion 7',
            'description' => 'This is Legion 7',
            'price' => 18000000,
            'category_id' => 3,
            'image_path'=> 'legion7.jpg'],
            ['name' => 'Asus Zen Book 14',
            'description' => 'This is Asus Zen Book 14',
            'price' => 15000000,
            'category_id' => 3,
            'image_path'=> 'asuszenbook14.jpg'],
            ['name' => 'LG 43 FHD',
            'description' => 'This is LG 43 FHD',
            'price' => 20000000,
            'category_id' => 1,
            'image_path'=> 'lg43fhd.jpg'],
            ['name' => 'Galaxy Tab 6 Lite',
            'description' => 'This is Galaxy Tab 6 Lite',
            'price' => 9000000,
            'category_id' => 2,
            'image_path'=> 'galaxytab6lite.jpg'],
        ];
        
        foreach ($data_list as $data) {
            Product::create($data);
        }
    }
}
