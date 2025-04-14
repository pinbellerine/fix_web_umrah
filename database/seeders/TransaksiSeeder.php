<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kategori = ['Haji', 'Umrah', 'Wisata Domestik', 'Wisata Luar Negeri'];
        
        for ($i = 0; $i < 10; $i++) {
            $total = $faker->numberBetween(1000, 5000) * 10000;
            $setoran = $faker->numberBetween(500, $total/10000) * 10000;
            $keterangan = $setoran >= $total ? 'Lunas' : 'Belum Lunas';
            
            Transaksi::create([
                'nama_peserta' => $faker->name(),
                'foto_bukti_transaksi' => 'bukti_default.jpg',
                'total_tagihan' => $total,
                'tanggal_pembayaran' => $faker->date('Y-m-d', 'now'),
                'setoran_tagihan' => $setoran,
                'kategori' => $faker->randomElement($kategori),
                'keterangan' => $keterangan,
            ]);
        }
    }
}
