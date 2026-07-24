<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function formDaftar($id)
    {
        // Mengambil data lomba spesifik berdasarkan ID
        $lomba = Lomba::findOrFail($id);
        
        // Memanggil file view 'daftar1.blade.php'
        return view('daftar1', compact('lomba'));
    }

public function prosesDaftar(Request $request)
    {
        // Simpan data pendaftaran ke database
        \App\Models\Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }

// Menampilkan halaman admin data pendaftar
    public function adminIndex()
    {
        // Mengambil semua data pendaftar beserta relasi lombanya
        $pendaftars = \App\Models\Pendaftar::latest()->get();
        return view('admin_pendaftar', compact('pendaftars'));
    }

    // Menghapus data pendaftar
    public function destroyPendaftar($id)
    {
        $pendaftar = \App\Models\Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}