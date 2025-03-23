<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'kode_booking',
        'tanggal_booking',
        'jadwal_booking',
        'status',
        'keterangan',
    ];

    protected $table = 'booking';
}
