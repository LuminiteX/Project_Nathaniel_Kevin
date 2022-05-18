<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_list = [
            ['name' => 'Television'],
            ['name' => 'Phone'],
            ['name' => 'Laptop']
        ];
        
        foreach ($data_list as $data) {
            Category::create($data);
        }
    }
}
