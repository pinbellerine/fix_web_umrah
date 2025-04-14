<?php

namespace Database\Seeders;

use App\Models\JamaahUmrah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class JamaahUmrahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i < 5; $i++) {
            $gender = $faker->randomElement(['L', 'P']);
            $firstName = $gender === 'L' ? $faker->firstNameMale() : $faker->firstNameFemale();
            
            JamaahUmrah::create([
                'nama_peserta' => $firstName . ' ' . $faker->lastName(),
                'nik' => $faker->numerify('################'),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date('Y-m-d', '-20 years'),
                'jenis_kelamin' => $gender,
                'foto_peserta' => 'default_profile.jpg',
                'no_paspor' => $faker->bothify('?####???#'),
                'issuing_office' => 'Kantor Imigrasi ' . $faker->city(),
                'date_of_issued' => $faker->date('Y-m-d', '-2 years'),
                'date_of_expiry' => $faker->date('Y-m-d', '+3 years'),
                'jenis_hubungan' => $faker->randomElement(['Keluarga', 'Suami-istri']),
                'foto_ktp' => 'ktp_default.jpg',
                'jenis_perjalanan' => 'Umrah Reguler',
                'date_of_issued_perjalanan' => $faker->date('Y-m-d', '-1 months'),
                'biaya' => $faker->numberBetween(2500, 4000) * 10000,
                'date_of_expiry_perjalanan' => $faker->date('Y-m-d', '+6 months'),
                'hotel' => 'Hotel ' . $faker->company(),
                'transportasi' => $faker->randomElement(['Bus', 'Pesawat']),
                'kode_khusus_perjalanan' => $faker->bothify('UM-####??'),
                'catatan' => $faker->paragraph(),
                'foto_catatan' => 'catatan_default.jpg',
                'username' => $faker->userName(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'no_telepon' => $faker->numerify('08##########'),
            ]);
        }
    }
}
