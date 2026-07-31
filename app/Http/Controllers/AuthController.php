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

        // Cari user berdasarkan email di database
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password-nya cocok
        if ($user && Hash::check($request->password, $user->password)) {
            
            // Set session login untuk admin/panitia
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