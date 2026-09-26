<?php

use App\Http\Controllers\BengkelController;

// Jalur untuk melihat halaman data bengkel
Route::get('/bengkel', [BengkelController::class, 'index']);

// Jalur untuk memproses penyimpanan data dari form
Route::post('/bengkel', [BengkelController::class, 'store']);