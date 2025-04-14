<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        // Clear existing records to prevent duplicates
        DB::table('admin_login')->truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        // Admin user
        DB::table('admin_login')->insert([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'user_type' => 'admin',
            'user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Regular user
        DB::table('admin_login')->insert([
            'username' => 'user',
            'password' => Hash::make('password'),
            'role' => 'user',
            'user_type' => 'admin',
            'user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Supervisor (also admin role)
        DB::table('admin_login')->insert([
            'username' => 'supervisor',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'user_type' => 'admin',
            'user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
