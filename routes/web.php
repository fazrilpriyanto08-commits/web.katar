<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Lomba;

// 1. Halaman Beranda (Utama)
Route::get('/', [LombaController::class, 'index']);

// 2. Halaman Struktur Panitia
Route::get('/panitia', function () {
    return view('panitia');
});

// 3. Halaman Galeri
Route::get('/galeri', function () {
    return view('galeri');
});

// 4. Fitur Pendaftaran Online
Route::get('/daftar-lomba/{id}', [PendaftaranController::class, 'formDaftar']);
Route::post('/proses-daftar', [PendaftaranController::class, 'prosesDaftar']);

// Route untuk Halaman Admin Panitia
Route::get('/admin/pendaftar', [\App\Http\Controllers\PendaftaranController::class, 'adminIndex']);
Route::delete('/admin/pendaftar/{id}', [\App\Http\Controllers\PendaftaranController::class, 'destroyPendaftar']);