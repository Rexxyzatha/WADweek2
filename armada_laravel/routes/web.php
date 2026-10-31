<?php

use App\Http\Controllers\ArmadaKendaraanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/tes-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "DB berhasil connect!";
    } catch (\Exception $e) {
        return 'DB gagal connect: ' . $e->getMessage();
    }
})->withoutMiddleware('web');

// Halaman Publik
Route::get('/', [ArmadaKendaraanController::class, 'index'])->name('home');
Route::post('/kendaraan', [ArmadaKendaraanController::class, 'store'])->name('kendaraan.store');
Route::get('/daftar-kendaraan', [ArmadaKendaraanController::class, 'daftar'])->name('kendaraan.daftar');

// Autentikasi (Login & Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman yang Dilindungi (Wajib Login)
Route::middleware('auth')->group(function () {
    Route::get('/kendaraan/{kendaraan}/edit', [ArmadaKendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::put('/kendaraan/{kendaraan}', [ArmadaKendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('/kendaraan/{kendaraan}', [ArmadaKendaraanController::class, 'destroy'])->name('kendaraan.destroy');
});
