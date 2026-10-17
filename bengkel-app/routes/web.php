<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BengkelController;

// Route Guest (Hanya bisa diakses kalau BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route Auth (Hanya bisa diakses kalau SUDAH login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('bengkel', BengkelController::class);
    Route::get('/', function () {
        return redirect()->route('bengkel.index');
    });
});