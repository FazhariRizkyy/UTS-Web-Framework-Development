<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'booking_id',
        'kode_transaksi',
        'jumlah',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    protected $table = 'transaksi';
}
