<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usertype')->insert([
            'role' => 'Admin',
        ]);
        DB::table('usertype')->insert([
            'role' => 'Resident',
        ]);
        DB::table('usertype')->insert([
            'role' => 'Moderator',
        ]);
    }
}
