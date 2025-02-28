<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'name' => 'Coca-Cola',
            'seller' => 'Carlos Mendes',
            'address' => 'Rua das Flores, 123',
            'cellphone' => '(11) 99999-9999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'name' => 'Elma Chips',
            'seller' => 'Gabriel',
            'address' => 'Rua das Bobos, 0',
            'cellphone' => '(11) 99999-9999',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
