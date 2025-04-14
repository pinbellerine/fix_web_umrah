<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\JamaahHaji;
use App\Models\JamaahUmrah;
use App\Models\WisataDomestik;
use App\Models\WisataLuarNegeri;
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
        
        // Get some travelers from each category to create transactions for
        $hajiTravelers = JamaahHaji::all();
        $umrahTravelers = JamaahUmrah::all();
        $domestikTravelers = WisataDomestik::all();
        $luarNegeriTravelers = WisataLuarNegeri::all();
        
        // Create transactions for each type
        foreach ($hajiTravelers as $traveler) {
            $total = $faker->numberBetween(3500, 5000) * 10000;
            $setoran = $faker->numberBetween($total/2/10000, $total/10000) * 10000;
            $keterangan = $setoran >= $total ? 'Lunas' : 'Belum Lunas';
            
            Transaksi::create([
                'nama_peserta' => $traveler->nama_peserta,
                'foto_bukti_transaksi' => 'bukti_default.jpg',
                'total_tagihan' => $total,
                'tanggal_pembayaran' => $faker->date('Y-m-d', 'now'),
                'setoran_tagihan' => $setoran,
                'kategori' => 'Haji',
                'keterangan' => $keterangan,
            ]);
        }
        
        foreach ($umrahTravelers as $traveler) {
            $total = $faker->numberBetween(2500, 4000) * 10000;
            $setoran = $faker->numberBetween($total/2/10000, $total/10000) * 10000;
            $keterangan = $setoran >= $total ? 'Lunas' : 'Belum Lunas';
            
            Transaksi::create([
                'nama_peserta' => $traveler->nama_peserta,
                'foto_bukti_transaksi' => 'bukti_default.jpg',
                'total_tagihan' => $total,
                'tanggal_pembayaran' => $faker->date('Y-m-d', 'now'),
                'setoran_tagihan' => $setoran,
                'kategori' => 'Umrah',
                'keterangan' => $keterangan,
            ]);
        }
        
        foreach ($domestikTravelers as $traveler) {
            $total = $faker->numberBetween(100, 500) * 10000;
            $setoran = $faker->numberBetween($total/2/10000, $total/10000) * 10000;
            $keterangan = $setoran >= $total ? 'Lunas' : 'Belum Lunas';
            
            Transaksi::create([
                'nama_peserta' => $traveler->nama_peserta,
                'foto_bukti_transaksi' => 'bukti_default.jpg',
                'total_tagihan' => $total,
                'tanggal_pembayaran' => $faker->date('Y-m-d', 'now'),
                'setoran_tagihan' => $setoran,
                'kategori' => 'Wisata Domestik',
                'keterangan' => $keterangan,
            ]);
        }
        
        foreach ($luarNegeriTravelers as $traveler) {
            $total = $faker->numberBetween(1000, 3000) * 10000;
            $setoran = $faker->numberBetween($total/2/10000, $total/10000) * 10000;
            $keterangan = $setoran >= $total ? 'Lunas' : 'Belum Lunas';
            
            Transaksi::create([
                'nama_peserta' => $traveler->nama_peserta,
                'foto_bukti_transaksi' => 'bukti_default.jpg',
                'total_tagihan' => $total,
                'tanggal_pembayaran' => $faker->date('Y-m-d', 'now'),
                'setoran_tagihan' => $setoran,
                'kategori' => 'Wisata Luar Negeri',
                'keterangan' => $keterangan,
            ]);
        }
    }
}
