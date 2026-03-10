<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami3 extends Model
{
     protected $table = 'tentang_kami_3';

    protected $fillable = [
        'image',
        'name',
        'rating',
        'description'
    ];
}
