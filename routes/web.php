<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController; // Tambahkan ini

Route::get('/', [LombaController::class, 'index']);
Route::get('/panitia', function () {
    return view('panitia');
});

// Route Baru untuk Fitur Pendaftaran Online
Route::get('/daftar-lomba/{id}', [PendaftaranController::class, 'formDaftar']);
Route::post('/proses-daftar', [PendaftaranController::class, 'prosesDaftar']);

Route::get('/galeri', function () {
    return view('galeri');
});