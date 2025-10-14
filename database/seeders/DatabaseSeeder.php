<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed categories
        $categories = [
            ['id'=> 1 , 'name' => 'fresh', 'description' => 'fresh food', 'imagepath' => 'asset\\img\\ph2.jpeg'],
            ['id'=> 2 , 'name' => 'fast', 'description' => 'fast food', 'imagepath' => 'asset\\img\\ph1.jpeg'],
            ['id'=> 3 ,'name' => 'cold', 'description' => 'cold food', 'imagepath' => 'asset\\img\\ph7.jpeg'],
            ['id'=> 4 ,'name' => 'heat', 'description' => 'heat food', 'imagepath' => 'asset\\img\\ph3.jpeg'],
            ['id'=> 5 ,'name' => 'cold drinks', 'description' => 'cold drinks', 'imagepath' => 'asset\\img\\ph4.jpeg'],
            ['id'=> 6 ,'name' => 'heat drinks', 'description' => 'heat drinks', 'imagepath' => 'asset\\img\\ph5.jpeg'],
        ];
        DB::table('categories')->insertOrIgnore($categories);

        // Seed products
    for ($i = 1; $i < 25; $i++) {
        Product::create([
            'name'        => 'Product ' . $i,
            'description' => 'Product number ' . $i,
            'price'       => rand(10, 100),
            'quantity'    => rand(10, 100),
            'cat_id'      => rand(1, 6), // assuming your categories IDs are 1, 2, 3
            'imagpath' => 'assets/img/' . $i . '.jpeg',
        ]);
    }

}
}
