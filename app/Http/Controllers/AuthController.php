<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Memproses Login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Bypass pengecekan hash sementara agar pasti bisa masuk
        if ($user && $request->password == 'password123') {
            
            session([
                'is_admin'   => true,
                'user_id'    => $user->id,
                'user_name'  => $user->name,
                'user_role'  => $user->role ?? 'Panitia',
            ]);

            return redirect('/admin/pendaftar')->with('success', 'Berhasil masuk ke Dashboard!');
        }

        return redirect('/login')->withErrors(['login_error' => 'Email atau Password salah!']);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Berhasil keluar!');
    }
}