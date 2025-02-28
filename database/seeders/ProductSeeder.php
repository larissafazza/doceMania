<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Energético Monster Kiwi',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addMonths(6),
            'cost' => 8.00,
            'price' => 13.00,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Batata Ruffles Cebola e Salsa',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addMonths(12),
            'cost' => 3.99,
            'price' => 5.79,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
