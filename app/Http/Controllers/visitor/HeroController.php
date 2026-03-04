<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first(); // ambil 1 data saja (hero utama)

        return view('visitor.index', compact('hero'));
    }
}
