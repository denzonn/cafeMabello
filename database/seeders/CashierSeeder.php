<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Cashier',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('123'),
            'roles' => 'CASHIER',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
