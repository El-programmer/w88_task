<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) {
            Product::create([
                "title" => "Product ".$i,
                "description" => "Product ".$i ." description",
                "price" => random_int( 10,100),
                "user_id" => 1,
            ]);
        }
    }
}
