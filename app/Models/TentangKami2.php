<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TentangKami2 extends Model
{
    protected $table = 'tentang_kami_2';

    protected $fillable = [
        'image',
        'icon',
        'title',
        'description'
    ];
}
