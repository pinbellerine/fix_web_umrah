<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WisataDomestik;
use App\Models\AdminLogin;
use Illuminate\Support\Facades\Hash;

class WisataDomestikController extends Controller
{
    public function index()
    {
        $wisatadomestik = WisataDomestik::all();
        return view('wisatadomestik.index', compact('wisatadomestik'));
    }

    public function create()
    {
        // Ambil semua data peserta wisata luar negeri untuk ditampilkan sebagai "data hubungan"
        $wisatadomestik = WisataDomestik::all();
        // Kirim ke view
        return view('wisata-domestik.create', compact('wisatadomestik'));
    }

    public function show($id)
    {
        $data = WisataDomestik::where('id', $id)->get(); // tetap pakai get() agar bisa foreach, atau pakai ->first() kalau hanya satu
        return view('datawdview', ['dataWD' => $data]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama_peserta' => 'required',
            'nik' => 'required|unique:wisata_domestik',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'foto_peserta' => 'required|image',
            'foto_ktp' => 'required|image',
            'jenis_perjalanan' => 'required',
            'biaya' => 'required',
            'hotel' => 'required',
            'date_of_issued_perjalanan' => 'required|date',
            'date_of_expiry_perjalanan' => 'required|date',
            'transportasi' => 'required',
            'kode_khusus_perjalanan' => 'required',
            'catatan' => 'required',
            'foto_catatan' => 'required|image',
            'username' => 'required|unique:wisata_domestik',
            'password' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:wisata_domestik',
        ]);
        
        // Process file uploads
        if ($request->hasFile('foto_peserta')) {
            $fotoPesertaPath = $request->file('foto_peserta')->store('foto_peserta', 'public');
            $validated['foto_peserta'] = $fotoPesertaPath;
        }
        
        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request->file('foto_ktp')->store('foto_ktp', 'public');
            $validated['foto_ktp'] = $fotoKtpPath;
        }
        
        if ($request->hasFile('foto_catatan')) {
            $fotoCatatanPath = $request->file('foto_catatan')->store('foto_catatan', 'public');
            $validated['foto_catatan'] = $fotoCatatanPath;
        }
        
        // Hash the password
        $validated['password'] = Hash::make($request->password);
        
        // Create the record
        $wisataDomestik = WisataDomestik::create($validated);
        
        return redirect()->route('wisata-domestik.index')
            ->with('success', 'Data wisata domestik berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peserta = WisataDomestik::findOrFail($id);
        return view('datawdchange', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',

            'foto_peserta' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'jenis_perjalanan' => 'required|string',
            'biaya' => 'required|string',
            'hotel' => 'required|string',
            'date_of_issued_perjalanan' => 'required|date',
            'date_of_expiry_perjalanan' => 'required|date',
            'transportasi' => 'required|string',
            //'kode_khusus_perjalanan' => 'required|string',

            'catatan' => 'required|string',
            'foto_catatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'username' => 'required|string|max:255',
            'password' => 'nullable|string', // password opsional saat edit
            'no_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $peserta = WisataDomestik::findOrFail($id);
        $oldUsername = $peserta->username;

        // Upload ulang file jika ada
        if ($request->hasFile('foto_peserta')) {
            $peserta->foto_peserta = $request->file('foto_peserta')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_ktp')) {
            $peserta->foto_ktp = $request->file('foto_ktp')->store('uploads', 'public');
        }

        if ($request->hasFile('foto_catatan')) {
            $peserta->foto_catatan = $request->file('foto_catatan')->store('uploads', 'public');
        }

        // Update data
        $peserta->nama_peserta = $request->nama_peserta;
        $peserta->nik = $request->nik;
        $peserta->tempat_lahir = $request->tempat_lahir;
        $peserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->jenis_kelamin = $request->jenis_kelamin;

        $peserta->jenis_perjalanan = $request->jenis_perjalanan;
        $peserta->biaya = $request->biaya;
        $peserta->hotel = $request->hotel;
        $peserta->date_of_issued_perjalanan = $request->date_of_issued_perjalanan;
        $peserta->date_of_expiry_perjalanan = $request->date_of_expiry_perjalanan;
        $peserta->transportasi = $request->transportasi;
        $peserta->kode_khusus_perjalanan = $request->kode_khusus_perjalanan;

        $peserta->catatan = $request->catatan;
        $peserta->username = $request->username;
        if ($request->filled('password')) {
            $peserta->password = bcrypt($request->password);
        }
        $peserta->no_telepon = $request->no_telepon;
        $peserta->email = $request->email;

        $peserta->save();

        // Update record in admin_login table if username changed
        if ($oldUsername !== $request->username) {
            $adminLogin = AdminLogin::where('username', $oldUsername)->first();
            if ($adminLogin) {
                $adminLogin->username = $request->username;
                $adminLogin->save();
            } else {
                // Create new admin login if it doesn't exist
                AdminLogin::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password ?: ''),
                    'role' => 'user'
                ]);
            }
        }

        // Update password if provided
        if ($request->filled('password')) {
            AdminLogin::updateOrCreate(
                ['username' => $request->username],
                ['password' => bcrypt($request->password)]
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
