<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JamaahUmrah extends Model
{
    use HasFactory;

    protected $table = 'jamaah_umrah';

    protected $fillable = [
        'nama_peserta', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'foto_peserta', 'no_paspor', 'issuing_office',
        'date_of_issued', 'date_of_expiry', 'jenis_hubungan', 'foto_ktp','jenis_perjalanan', 'date_of_issued_perjalanan',
        'biaya', 'date_of_expiry_perjalanan', 'hotel', 'transportasi',
        'kode_khusus_perjalanan', 'catatan', 'foto_catatan', 'username', 'email', 'password', 'no_telepon'
    ];
}
