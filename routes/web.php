<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DaftarTripController;

// RUTE VISITOR
Route::get('/', [HeroController::class, 'index']);
Route::get('/daftar-trip', [DaftarTripController::class, 'index'])->name('daftar_trip.index');






// RUTE ADMIN

// Route::get('/', function () {
//     return view('/visitor/index');
// });
