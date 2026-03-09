<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DaftarTripController;

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::prefix('trip')->group(function () {

    Route::get('/', [DaftarTripController::class, 'index'])
        ->name('daftar_trip.index');
});



// RUTE ADMIN

// Route::get('/', function () {
//     return view('/visitor/index');
// });
