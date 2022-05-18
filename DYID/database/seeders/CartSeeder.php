<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['user_id' => 1],
            ['user_id' => 2]
        ];
        
        foreach ($data_list as $data) {
            Cart::create($data);
        }
    }
}
