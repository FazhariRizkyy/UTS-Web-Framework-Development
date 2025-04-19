<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $fillable = [
        'id_user',
        'id_paket_wisata',
        'tanggal_transaksi',
        'jumlah_tiket',
        'total_harga',
        'metode_pembayaran',
        'status_transaksi',
    ];

    protected $table = 'riwayat';
}