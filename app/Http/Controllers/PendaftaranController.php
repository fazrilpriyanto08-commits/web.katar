<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pendaftar;
use App\Models\Pengumuman;
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
        Pendaftar::create([
            'lomba_id'   => $request->lomba_id,
            'nama_warga' => $request->nama,
            'nomor_hp'   => $request->no_hp,
            'rt_rw'      => $request->rt_rw ?? 'RT 012 / RW 05',
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    // Menghapus data pendaftar
    public function destroyPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus!');
    }

    // Menampilkan halaman admin data pendaftar & pengumuman
    public function adminIndex()
    {
        $pendaftars  = Pendaftar::latest()->get();
        $pengumumans = Pengumuman::latest()->get();

        return view('admin_pendaftar', compact('pendaftars', 'pengumumans'));
    }
}