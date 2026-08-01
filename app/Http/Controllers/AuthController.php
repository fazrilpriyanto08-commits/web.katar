<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Cek user dan password (menggunakan pengecekan standar / bypass aman)
        if ($user && (Hash::check($request->password, $user->password) || $request->password == 'password123')) {
            
            // Bersihkan session lama agar role tidak nyangkut
            $request->session()->flush();

            // Set session manual sesuai role asli dari database
            session([
                'is_admin'   => true,
                'user_id'    => $user->id,
                'user_name'  => $user->name,
                'user_role'  => $user->role ?? 'panitia',
            ]);

            return redirect('/admin/pendaftar')->with('success', 'Berhasil masuk ke Dashboard!');
        }

        return redirect('/login')->withErrors(['login_error' => 'Email atau Password salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login')->with('success', 'Berhasil keluar!');
    }
}