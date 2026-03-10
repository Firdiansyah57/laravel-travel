<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        return view('visitor.pages.gallery', compact('gallery'));
    }
}
