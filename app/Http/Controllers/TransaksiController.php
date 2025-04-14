<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        return view('transaksi.create');
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
            'kategori' => 'required|string|max:100',
            'keterangan' => 'required|in:Lunas,Belum Lunas',
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
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan');
    }
}

