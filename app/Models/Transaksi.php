<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'nama_peserta',
        'foto_bukti_transaksi',
        'total_tagihan',
        'tanggal_pembayaran',
        'setoran_tagihan',
        'kategori',
        'keterangan',
    ];
}
