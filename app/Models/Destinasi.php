<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $fillable = [
        'nama_destinasi',
        'deskripsi',
        'gambar',
        'lokasi',
        'status_aktif'
    ];

    protected $table = 'destinasi';
}
