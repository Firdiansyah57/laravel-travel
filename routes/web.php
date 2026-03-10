<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DaftarTripController;
use App\Http\Controllers\visitor\TentangKamiController;

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::prefix('trip')->group(function () {

    Route::get('/', [DaftarTripController::class, 'index'])
        ->name('daftar_trip.index');
});

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang_kami.index');




// RUTE ADMIN

// Route::get('/', function () {
//     return view('/visitor/index');
// });
