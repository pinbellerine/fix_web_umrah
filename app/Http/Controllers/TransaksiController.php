<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\WisataLuarNegeri;
use App\Models\WisataDomestik;
use App\Models\JamaahUmrah;
use App\Models\JamaahHaji;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

     // Form tambah transaksi
     public function create()
     {
         $namaPeserta = DB::table('wisata_luar_negeri')->pluck('nama_peserta')
             ->merge(DB::table('wisata_domestik')->pluck('nama_peserta'))
             ->merge(DB::table('jamaah_umrah')->pluck('nama_peserta'))
             ->merge(DB::table('jamaah_haji')->pluck('nama_peserta'));

         return view('trcsadd', compact('namaPeserta'));
     }

      // AJAX: Ambil data peserta dari 4 tabel
    public function getPesertaData(Request $request)
    {
        $nama = $request->query('nama_peserta');

        $peserta = DB::table('wisata_luar_negeri')->where('nama_peserta', $nama)->first()
            ?? DB::table('wisata_domestik')->where('nama_peserta', $nama)->first()
            ?? DB::table('jamaah_umrah')->where('nama_peserta', $nama)->first()
            ?? DB::table('jamaah_haji')->where('nama_peserta', $nama)->first();

        if ($peserta) {
            return response()->json([
                'nik' => $peserta->nik,
                'jenis_perjalanan' => $peserta->jenis_perjalanan,
                'kode_khusus_perjalanan' => $peserta->kode_khusus_perjalanan,
            ]);
        } else {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }
    }

    // Menyimpan transaksi ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'foto_bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'total_tagihan' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date',
            'setoran_tagihan' => 'required|numeric',
            'kategori' => 'required|in:DP,Pelunasan',
            'keterangan' => 'required|in:Lunas,Belum Lunas',
            'kode_khusus_perjalanan' => 'required',


        ]);

        // Upload file gambar
        if ($request->hasFile('foto_bukti_transaksi')) {
            $fotoPath = $request->file('foto_bukti_transaksi')->store('uploads', 'public');
        }

        Transaksi::create([
            'nama_peserta' => $request->nama_peserta,
            'foto_bukti_transaksi' => $fotoPath,
            'total_tagihan' => $request->total_tagihan,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'setoran_tagihan' => $request->setoran_tagihan,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'kode_khusus_perjalanan'=> $request->kode_khusus_perjalanan,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan');
    }
}

