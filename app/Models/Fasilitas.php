<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'status_tersedia'
    ];

    protected $table = 'fasilitas';
}
