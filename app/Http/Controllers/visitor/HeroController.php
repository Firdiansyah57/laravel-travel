<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\DaftarTrip;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first(); // ambil 1 data saja (hero utama)

        $data = DaftarTrip::orderBy('tanggal', 'asc')->take(3)->get();

        return view('visitor.index', compact('hero', 'data'));
    }
}
