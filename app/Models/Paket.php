<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_hari',
        'status_aktif'
    ];

    protected $table = 'paket';
}
