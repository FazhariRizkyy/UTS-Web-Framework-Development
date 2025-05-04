<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id_paket',
        'kode_transaksi',
        'jumlah',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    protected $table = 'transaksi';
    
    public function paket(){
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }
}
