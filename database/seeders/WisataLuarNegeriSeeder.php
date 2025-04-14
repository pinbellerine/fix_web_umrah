<?php

namespace Database\Seeders;

use App\Models\WisataLuarNegeri;
use App\Models\AdminLogin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class WisataLuarNegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $destinasi = ['Jepang', 'Korea Selatan', 'Malaysia', 'Singapura', 'Thailand', 'Turki', 'Amerika Serikat', 'Eropa'];
        
        for ($i = 0; $i < 5; $i++) {
            $gender = $faker->randomElement(['L', 'P']);
            $firstName = $gender === 'L' ? $faker->firstNameMale() : $faker->firstNameFemale();
            $dest = $faker->randomElement($destinasi);
            $username = $faker->userName();
            $password = Hash::make('password');
            
            // Create wisata luar negeri record
            $wisataLuarNegeri = WisataLuarNegeri::create([
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
                'jenis_perjalanan' => 'Wisata ' . $dest,
                'date_of_issued_perjalanan' => $faker->date('Y-m-d', '+1 months'),
                'biaya' => $faker->numberBetween(1000, 3000) * 10000,
                'date_of_expiry_perjalanan' => $faker->date('Y-m-d', '+1 months +7 days'),
                'hotel' => 'Hotel ' . $faker->company(),
                'transportasi' => $faker->randomElement(['Bus', 'Pesawat']),
                'kode_khusus_perjalanan' => $faker->bothify('INT-####??'),
                'catatan' => $faker->paragraph(),
                'foto_catatan' => 'catatan_default.jpg',
                'username' => $username,
                'email' => $faker->unique()->safeEmail(),
                'password' => $password,
                'no_telepon' => $faker->numerify('08##########'),
            ]);

            // Create admin login record for this traveler
            $adminLogin = AdminLogin::create([
                'username' => $username,
                'password' => $password,
                'role' => 'user',
                'user_type' => 'wisata_luar_negeri',
                'user_id' => $wisataLuarNegeri->id
            ]);

            // Update wisata luar negeri record with admin_login_id
            $wisataLuarNegeri->admin_login_id = $adminLogin->id;
            $wisataLuarNegeri->save();
        }
    }
}
