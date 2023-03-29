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
            'name' => 'UPI',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Cash',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Cards',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Cheque',
        ]);
        DB::table('payment_modes')->insert([
            'name' => 'Other',
        ]);
    }
}
