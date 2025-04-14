<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WisataDomestik extends Model
{
    use HasFactory;

    protected $table = 'wisata_domestik';

    protected $fillable = [
        'nama_peserta',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'foto_peserta',
        'foto_ktp',
        'jenis_hubungan',
        'jenis_perjalanan',
        'biaya',
        'hotel',
        'date_of_issued_perjalanan',
        'date_of_expiry_perjalanan',
        'transportasi',
        'kode_khusus_perjalanan',
        'catatan',
        'foto_catatan',
        'username',
        'password',
        'no_telepon',
        'email',
    ];
}
