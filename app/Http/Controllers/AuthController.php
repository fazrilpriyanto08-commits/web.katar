<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 1. Menampilkan halaman form login
    public function showLoginForm()
    {
        // Jika sudah login, langsung lempar ke dashboard admin
        if (session('is_admin')) {
            return redirect('/admin/dashboard');
        }
        return view('login');
    }

    // 2. Memproses input login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'admin',
            'password' => 'katar012',
        ]);

        // Kredensial khusus Admin Panitia (bisa disesuaikan password-nya)
        if ($request->username === 'admin' && $request->password === 'katar012') {
            // Simpan status login ke Session
            session(['is_admin' => true, 'admin_name' => 'Panitia KATAR']);
            
            return redirect('/admin/dashboard')->with('success', 'Selamat datang kembali, Panitia!');
        }

        // Jika salah, kembalikan dengan pesan error
        return back()->withErrors(['login_error' => 'Username atau Password salah!']);
    }

    // 3. Memproses Logout
    public function logout()
    {
        // Hapus session admin
        session()->forget(['is_admin', 'admin_name']);
        
        return redirect('/login')->with('success', 'Berhasil keluar dari sistem.');
    }
}