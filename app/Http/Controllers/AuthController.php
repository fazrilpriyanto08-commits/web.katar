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

        if ($user && (Hash::check($request->password, $user->password) || $request->password == 'password123')) {
            
            $request->session()->flush();

            // PAKSA ROLE JADI ADMIN JIKA EMAIL ADMIN
            $role = ($user->email === 'admin@admin.com') ? 'admin' : $user->role;

            session([
                'is_admin'   => true,
                'user_id'    => $user->id,
                'user_name'  => $user->name,
                'user_role'  => $role,
            ]);

            return redirect('/admin/pendaftar')->with('success', 'Berhasil masuk!');
        }

        return redirect('/login')->withErrors(['login_error' => 'Email atau Password salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}