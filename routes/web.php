<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;

// ======================
// REDIRECT UTAMA
// ======================
Route::redirect('/', '/backend/login');

// ======================
// AUTH TANPA LOGIN
// ======================
Route::prefix('backend')->group(function () {

    // Form Login
    Route::get('/login', [LoginController::class, 'loginBackend'])
        ->name('backend.login');

    // Proses Login
    Route::post('/login', [LoginController::class, 'authenticateBackend'])
        ->name('backend.login.process');

    // Logout
    Route::post('/logout', [LoginController::class, 'logoutBackend'])
        ->name('backend.logout');
});

// ==============================
// PROTEKSI HALAMAN HANYA YG LOGIN
// ==============================
Route::middleware('auth')->prefix('backend')->name('backend.')->group(function () {

    // Dashboard
    Route::get('/beranda', [BerandaController::class, 'berandaBackend'])
        ->name('beranda');

    // CRUD Pelanggan
    Route::resource('pelanggan', PelangganController::class);

    // CRUD Layanan
    Route::resource('layanan', LayananController::class);

    // CRUD Transaksi
    Route::resource('transaksi', TransaksiController::class);
});
