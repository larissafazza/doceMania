<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;

class SaleProductSeeder extends Seeder
{
    public function run(): void
    {
        $sales = Sale::all();
        $products = Product::all();

        foreach ($sales as $sale) {
            $sale->products()->attach([
                $products->random()->id => ['quantity' => rand(1, 5)],
                $products->random()->id => ['quantity' => rand(1, 5)],
            ]);
        }
    }
}
