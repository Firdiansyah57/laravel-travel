<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Hero extends Model
{
    use HasFactory;

    protected $table = 'hero';

    protected $fillable = [
        'title',
        'sub_title',
        'image'
    ];
}
