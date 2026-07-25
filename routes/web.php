<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Lomba;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonasiController;

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

// Route Halaman Slide Daftar Lomba
Route::get('/daftar-lomba', function () {
    return view('daftar');
});

// 4. Fitur Pendaftaran Online
Route::get('/daftar-lomba/{id}', [PendaftaranController::class, 'formDaftar']);
Route::post('/proses-daftar', [PendaftaranController::class, 'prosesDaftar']);

// Route untuk Halaman Admin Panitia
Route::get('/admin/pendaftar', [\App\Http\Controllers\PendaftaranController::class, 'adminIndex']);
Route::delete('/admin/pendaftar/{id}', [\App\Http\Controllers\PendaftaranController::class, 'destroyPendaftar']);

// Route CRUD Pengumuman
Route::post('/admin/pengumuman', [PengumumanController::class, 'store']);
Route::put('/admin/pengumuman/{id}', [PengumumanController::class, 'update']);
Route::delete('/admin/pengumuman/{id}', [PengumumanController::class, 'destroy']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['web'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (!session('is_admin')) {
            return redirect('/login')->withErrors(['login_error' => 'BUKAN PANITIA YAA']);
        }
        return app(LombaController::class)->adminIndex();
    });
});

// Route Roda Doorprize
Route::get('/admin/doorprize', function () {
    return view('doorprize');
});

// Route Inventaris Perlap
Route::get('/admin/inventaris', function () {
    return view('inventaris');
});

// Form Donasi Publik
Route::get('/donasi', function () {
    return view('donasi');
});
Route::post('/donasi', [DonasiController::class, 'store']);