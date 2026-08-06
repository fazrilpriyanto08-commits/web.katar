<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog; // <-- 1. Import model ActivityLog
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin_users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'role'     => 'required|string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // 2. Catat otomatis ke Log Aktivitas saat admin menambah akun panitia baru
        ActivityLog::create([
            'user_name' => session('user_name', 'Admin Panitia'),
            'action'    => 'Menambahkan akun panitia baru: ' . $request->name . ' (' . $request->role . ')'
        ]);

        return redirect()->back()->with('success', 'Akun panitia berhasil ditambahkan!');
    }

    // Fungsi Ganti Password
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:4',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        // 3. Catat otomatis ke Log Aktivitas saat password akun panitia diubah
        ActivityLog::create([
            'user_name' => session('user_name', 'Admin Panitia'),
            'action'    => 'Memperbarui password untuk akun panitia: ' . $user->name
        ]);

        return redirect()->back()->with('success', 'Password akun ' . $user->name . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $namaUser = $user->name;
        $user->delete();

        // 4. Catat otomatis ke Log Aktivitas saat akun panitia dihapus
        ActivityLog::create([
            'user_name' => session('user_name', 'Admin Panitia'),
            'action'    => 'Menghapus akun panitia: ' . $namaUser
        ]);

        return redirect()->back()->with('success', 'Akun panitia berhasil dihapus!');
    }
}