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
            AdminLoginSeeder::class,
            JamaahHajiSeeder::class,
            JamaahUmrahSeeder::class,
            WisataDomestikSeeder::class,
            WisataLuarNegeriSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}
