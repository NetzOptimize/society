<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\ModuleSeeder;
use Database\Seeders\UserTypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PaymentModeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            SocietySeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            PaymentModeSeeder::class,
            ModuleSeeder::class
        ]);
    }
}
