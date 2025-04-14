<?php

namespace Database\Seeders;

use App\Models\WisataDomestik;
use App\Models\AdminLogin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class WisataDomestikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $destinasi = ['Bali', 'Yogyakarta', 'Lombok', 'Raja Ampat', 'Labuan Bajo', 'Bromo', 'Malang', 'Bandung'];
        
        for ($i = 0; $i < 5; $i++) {
            $gender = $faker->randomElement(['L', 'P']);
            $firstName = $gender === 'L' ? $faker->firstNameMale() : $faker->firstNameFemale();
            $dest = $faker->randomElement($destinasi);
            $username = $faker->userName();
            $password = Hash::make('password');
            
            // Create wisata domestik record
            $wisataDomestik = WisataDomestik::create([
                'nama_peserta' => $firstName . ' ' . $faker->lastName(),
                'nik' => $faker->numerify('################'),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date('Y-m-d', '-20 years'),
                'jenis_kelamin' => $gender,
                'foto_peserta' => 'default_profile.jpg',
                'foto_ktp' => 'ktp_default.jpg',
                'jenis_hubungan' => $faker->randomElement(['Keluarga', 'Suami-istri']),
                'jenis_perjalanan' => 'Wisata ' . $dest,
                'biaya' => $faker->numberBetween(100, 500) * 10000,
                'hotel' => 'Hotel ' . $faker->company(),
                'date_of_issued_perjalanan' => $faker->date('Y-m-d', '+1 months'),
                'date_of_expiry_perjalanan' => $faker->date('Y-m-d', '+1 months +7 days'),
                'transportasi' => $faker->randomElement(['Bus', 'Pesawat', 'Kereta']),
                'kode_khusus_perjalanan' => $faker->bothify('DOM-####??'),
                'catatan' => $faker->paragraph(),
                'foto_catatan' => 'catatan_default.jpg',
                'username' => $username,
                'password' => $password,
                'no_telepon' => $faker->numerify('08##########'),
                'email' => $faker->unique()->safeEmail(),
            ]);

            // Create admin login record for this traveler
            $adminLogin = AdminLogin::create([
                'username' => $username,
                'password' => $password,
                'role' => 'user',
                'user_type' => 'wisata_domestik',
                'user_id' => $wisataDomestik->id
            ]);

            // Update wisata domestik record with admin_login_id
            $wisataDomestik->admin_login_id = $adminLogin->id;
            $wisataDomestik->save();
        }
    }
}
