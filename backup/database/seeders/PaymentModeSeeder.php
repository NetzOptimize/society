<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_modes')->insert([
            'name' => 'Bank Account',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Cash',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'GPay',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'PayTM',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Others',
        ]);
    }
}
