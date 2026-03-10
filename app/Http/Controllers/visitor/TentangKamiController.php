<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TentangKami;
use App\Models\TentangKami2;
use App\Models\TentangKami3;

class TentangKamiController extends Controller
{
     public function index()
    {
        $tentang_kami = TentangKami::all();
        $tentang_kami_2 = TentangKami2::all();
        $tentang_kami_3 = TentangKami3::all();

        return view('visitor.pages.tentang_kami', compact('tentang_kami', 'tentang_kami_2', 'tentang_kami_3'));
    }
}
