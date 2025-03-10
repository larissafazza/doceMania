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
            'name' => 'Energético Monster Côco',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(10),
            'cost' => 8.00,
            'price' => 13.00,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Cheetos Queijo',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(40),
            'cost' => 3.99,
            'price' => 5.79,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Batata Família',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(20),
            'cost' => 8.00,
            'price' => 13.00,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Cheetos Requeijão',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(12),
            'cost' => 3.99,
            'price' => 5.79,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Energético Monster Original',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(10),
            'cost' => 8.00,
            'price' => 13.00,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Batata Ruffles Churrasco',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 3.99,
            'price' => 5.79,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Energético Monster Mango',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 8.00,
            'price' => 13.00,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Batata Ruffles Natural',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(16),
            'cost' => 3.99,
            'price' => 5.79,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Ice Tea Limão',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 3.99,
            'price' => 5.60,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Ice Tea Limão Zero',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 4.09,
            'price' => 5.90,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Ice Tea Pêssego',
            'quantity' => 10,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 3.99,
            'price' => 5.60,
            'supplier_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Biscoito Magia',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 0.99,
            'price' => 3.49,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Biscoito Recheado',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 0.99,
            'price' => 2.49,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Biscoito Waffer Aymore',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(20),
            'cost' => 0.99,
            'price' => 1.49,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Biscoito TrioMax',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 0.89,
            'price' => 1.50,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Biscoito Magia',
            'quantity' => 40,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 0.99,
            'price' => 3.49,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Bala Fini 250g',
            'quantity' => 0,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 2.99,
            'price' => 6.49,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'ChicleFita',
            'quantity' => 0,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 1.99,
            'price' => 2.40,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('products')->insert([
            'name' => 'DipLoko',
            'quantity' => 0,
            'expiration_date' => Carbon::now()->addDays(60),
            'cost' => 0.99,
            'price' => 1.90,
            'supplier_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
