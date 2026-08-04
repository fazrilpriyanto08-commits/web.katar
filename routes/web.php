<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Lomba;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ProfileController;

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
Route::get('/daftar/{id}', [PendaftaranController::class, 'formDaftar']);
Route::get('/daftar-lomba/{id}', [PendaftaranController::class, 'formDaftar']);
Route::post('/proses-daftar', [PendaftaranController::class, 'prosesDaftar']);

// Auth Route
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Form Donasi Publik
Route::get('/donasi', function () {
    return view('donasi');
});
Route::post('/donasi', [DonasiController::class, 'store']);


// ==========================================
// AREA KHUSUS ADMIN (Hanya bisa diakses role 'admin')
// ==========================================
Route::middleware(['role:admin'])->group(function () {
    // Manajemen User Panitia
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users', [UserController::class, 'store']);
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);
    
    // Log Aktivitas
    Route::get('/admin/logs', [ActivityLogController::class, 'index']);
});


// ==========================================
// AREA ADMIN & PANITIA (Bisa diakses keduanya)
// ==========================================
Route::middleware(['role:admin,panitia'])->group(function () {
    Route::get('/admin/dashboard', [PendaftaranController::class, 'adminIndex']);
    Route::get('/admin/pendaftar', [PendaftaranController::class, 'adminIndex']);
    Route::delete('/admin/pendaftar/{id}', [PendaftaranController::class, 'destroyPendaftar']);

    // Donasi & Keuangan
    Route::get('/admin/donasi', [DonasiController::class, 'indexAdmin']);
    Route::post('/admin/donasi/{id}/status', [DonasiController::class, 'updateStatus']);
    Route::get('/admin/keuangan', [KeuanganController::class, 'index']);
    Route::post('/admin/keuangan', [KeuanganController::class, 'store']);
    Route::delete('/admin/keuangan/{id}', [KeuanganController::class, 'destroy']);

    // Fitur Pendukung Admin
    Route::get('/admin/doorprize', function () { return view('doorprize'); });
    Route::get('/admin/inventaris', function () { return view('inventaris'); });

    // CRUD Pengumuman
    Route::post('/admin/pengumuman', [PengumumanController::class, 'store']);
    Route::put('/admin/pengumuman/{id}', [PengumumanController::class, 'update']);
    Route::delete('/admin/pengumuman/{id}', [PengumumanController::class, 'destroy']);

    // ROUTE PROFIL PANITIA DIPINDAH KESINI AGAR SESI LOGIN TERBACA
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::patch('/admin/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
});