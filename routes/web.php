<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DaftarTripController;
use App\Http\Controllers\visitor\TentangKamiController;
use App\Http\Controllers\visitor\GalleryController;

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::prefix('trip')->group(function () {

    Route::get('/', [DaftarTripController::class, 'index'])
        ->name('daftar_trip.index');
});

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang_kami.index');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');




// RUTE ADMIN

// Route::get('/', function () {
//     return view('/visitor/index');
// });
