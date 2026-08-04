<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function edit()
    {
        // Ambil ID user dari session custom project kamu
        $userId = session('user_id') ?? session('id');
        
        if (!$userId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = DB::table('users')->where('id', $userId)->first();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = session('user_id') ?? session('id');
        if (!$userId) return redirect('/login');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userId,
        ]);

        DB::table('users')->where('id', $userId)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now(),
        ]);

        // Update nama di session juga agar langsung berubah di sidebar
        session(['user_name' => $request->name]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $userId = session('user_id') ?? session('id');
        if (!$userId) return redirect('/login');

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = DB::table('users')->where('id', $userId)->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai!']);
        }

        DB::table('users')->where('id', $userId)->update([
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }
}