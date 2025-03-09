<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'type' => 'admin',
            'email' => 'marcello@example.com',
            'name' => 'Marcello',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'type' => 'func',
            'email' => 'alice@example.com',
            'name' => 'Alice',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'type' => 'func',
            'email' => 'aurora@example.com',
            'name' => 'Aurora',
            'password' => Hash::make('123456'),
        ]);
    }
}
