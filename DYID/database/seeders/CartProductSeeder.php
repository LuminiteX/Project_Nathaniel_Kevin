<?php

namespace Database\Seeders;

use App\Models\CartProduct;
use Illuminate\Database\Seeder;

class CartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['cart_id' => 1,
            'product_id' => 1,
            'quantity' => 2],
            ['cart_id' => 1,
            'product_id' => 3,
            'quantity' => 1],
            ['cart_id' => 2,
            'product_id' => 4,
            'quantity' => 3]
        ];
        
        foreach ($data_list as $data) {
            CartProduct::create($data);
        }
    }
}
