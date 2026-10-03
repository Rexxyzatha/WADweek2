<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BengkelController;

// Mengarahkan halaman utama (/) langsung ke bengkel.index
Route::get('/', function () {
    return redirect()->route('bengkel.index');
});

// Resource route untuk CRUD Bengkel
Route::resource('bengkel', BengkelController::class);