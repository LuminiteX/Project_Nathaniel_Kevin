<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['user_id' => 1,
            'total_price' => 23000000],
            ['user_id' => 1,
            'total_price' => 21000000]
        ];
        
        foreach ($data_list as $data) {
            Transaction::create($data);
        }
    }
}
