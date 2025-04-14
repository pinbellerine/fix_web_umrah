<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Create admin users first
            AdminLoginSeeder::class,
            
            // Then create travelers
            JamaahHajiSeeder::class,
            JamaahUmrahSeeder::class,
            WisataDomestikSeeder::class,
            WisataLuarNegeriSeeder::class,
            
            // Finally create transactions
            TransaksiSeeder::class,
        ]);
    }
}
