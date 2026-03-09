<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarTrip extends Model
{
    protected $table = 'daftar_trip';

    protected $fillable = [
        'tanggal',
        'image',
        'title',
        'price',
        'quota'
    ];
}
