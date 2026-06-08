<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Mendaftarkan route resource untuk ProductController
Route::resource('/products', ProductController::class);