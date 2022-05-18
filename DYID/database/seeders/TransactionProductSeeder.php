<?php

namespace Database\Seeders;

use App\Models\TransactionProduct;
use Illuminate\Database\Seeder;

class TransactionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['transaction_id' => 1,
            'product_id' => 2,
            'quantity' => 1],
            ['transaction_id' => 1,
            'product_id' => 3,
            'quantity' => 1],
            ['transaction_id' => 2,
            'product_id' => 1,
            'quantity' => 1],
            ['transaction_id' => 2,
            'product_id' => 3,
            'quantity' => 1]
        ];
        
        foreach ($data_list as $data) {
            TransactionProduct::create($data);
        }
    }
}
