<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\DaftarTrip;
use App\Models\TentangKami2;
use App\Models\TentangKami3;
use App\Models\Gallery;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first(); // ambil 1 data saja (hero utama)

        $data = DaftarTrip::orderBy('tanggal', 'asc')->take(3)->get();
        $tentang_kami_2 = TentangKami2::all();
        $tentang_kami_3 = TentangKami3::all();
        $gallery = Gallery::orderBy('image')->take(3)->get();

        return view('visitor.index', compact('hero', 'data','tentang_kami_2', 'tentang_kami_3', 'gallery'));
    }
}
