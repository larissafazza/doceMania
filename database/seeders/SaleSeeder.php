<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sales')->insert([
            'client_name' => 'João da Silva',
            'date_time' => Carbon::now(),
            'total_cost' => 150.00,
            'payment_method' => 'Credito',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sales')->insert([
            'client_name' => 'Maria Clara',
            'date_time' => Carbon::now(),
            'total_cost' => 50.00,
            'payment_method' => 'pix',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sales')->insert([
            'client_name' => 'Marcello',
            'date_time' => Carbon::now(),
            'total_cost' => 16.40,
            'payment_method' => 'dabito',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
