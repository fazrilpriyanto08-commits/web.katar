<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // 1. Menampilkan Form Pendaftaran
    public function formDaftar($id)
    {
        // Cari lomba berdasarkan ID yang diklik peserta
        $lomba = Lomba::findOrFail($id);
        
        return view('daftar', compact('lomba'));
    }

    // 2. Memproses data Form yang dikirim warga ke Database
    public function prosesDaftar(Request $request)
    {
        // Validasi inputan wajib diisi
        $request->validate([
            'nama_warga' => 'required|string|max:255',
            'nomor_hp'   => 'required|string|max:15',
            'rt_rw'      => 'required|string|max:50',
            'lomba_id'   => 'required|exists:lombas,id',
        ]);

        // Simpan ke database tabel pendaftars
        Pendaftar::create([
            'nama_warga' => $request->nama_warga,
            'nomor_hp'   => $request->nomor_hp,
            'rt_rw'      => $request->rt_rw,
            'lomba_id'   => $request->lomba_id,
        ]);

        // Kembalikan ke halaman depan dengan pesan sukses
        return redirect('/')->with('sukses', 'Pendaftaran Anda berhasil disimpan! Semangat berlomba!');
    }
}