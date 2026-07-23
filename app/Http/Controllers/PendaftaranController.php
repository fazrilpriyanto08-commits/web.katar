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
        // Validasi dan simpan data pendaftaran
        $request->validate([
            'lomba_id' => 'required',
            'nama'     => 'required',
            'no_hp'    => 'required',
        ]);

        // Simpan ke database (sesuaikan dengan Model Pendaftar milikmu)
        \App\Models\Pendaftar::create([
            'lomba_id' => $request->lomba_id,
            'nama'     => $request->nama,
            'no_hp'    => $request->no_hp,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }
}