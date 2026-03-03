<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitor\HeroController;

// RUTE VISITOR
Route::get('/', [HeroController::class, 'index']);






// RUTE ADMIN

Route::get('/', function () {
    return view('/visitor/index');
});
