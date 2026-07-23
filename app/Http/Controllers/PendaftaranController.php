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
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}