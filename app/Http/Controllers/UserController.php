<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user panitia
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin_users', compact('users'));
    }

    // Tambah User Panitia Baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,panitia',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->back()->with('success', 'User panitia berhasil ditambahkan!');
    }

    // Hapus User Panitia
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Mencegah hapus akun sendiri (opsional)
        if ($user->id == auth()->id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User panitia berhasil dihapus!');
    }
}