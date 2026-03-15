<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\visitor\HeroController;
use App\Http\Controllers\visitor\DestinationController;
use App\Http\Controllers\visitor\GalleryController;
use App\Http\Controllers\visitor\TentangKamiController;

use App\Http\Controllers\visitor\TripController;
use App\Http\Controllers\visitor\BookingController;


/*
|--------------------------------------------------------------------------
| VISITOR ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HeroController::class, 'index'])->name('home');

Route::get('/daftar-trip', [DestinationController::class, 'index'])
    ->name('destinations.index');

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
    ->name('tentang_kami.index');

Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery.index');


/*
|--------------------------------------------------------------------------
| TRIP SYSTEM
|--------------------------------------------------------------------------
*/

// Route::get('/search-trip', [TripController::class,'search'])
//     ->name('trip.search');

Route::get('/trip/{id}', [TripController::class,'detail'])
    ->name('trip.detail');

// Route::post('/booking', [BookingController::class,'store'])
//     ->name('booking.store');

Route::get('/destinations',[TripController::class,'destinations'])
->name('trip.destinations');


//rute untuk halaman reservasi
Route::get('/reservasi/{id}', [BookingController::class,'create'])
->name('reservasi.create');

Route::post('/reservasi/store', [BookingController::class,'store'])
->name('reservasi.store');
