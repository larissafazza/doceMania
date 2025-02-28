<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reports')->insert([
            'type' => 'Diário',
            'generated_at' => Carbon::now(),
            'total_credit' => 500.00,
            'total_debit' => 300.00,
            'total_card' => 200.00,
            'total_money' => 400.00,
            'total_pix' => 600.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('reports')->insert([
            'type' => 'Diário',
            'generated_at' => Carbon::now(),
            'total_credit' => 100.00,
            'total_debit' => 300.00,
            'total_card' => 200.00,
            'total_money' => 400.00,
            'total_pix' => 200.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('reports')->insert([
            'type' => 'Diário',
            'generated_at' => Carbon::now(),
            'total_credit' => 100.00,
            'total_debit' => 100.00,
            'total_card' => 20.00,
            'total_money' => 550.00,
            'total_pix' => 200.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
