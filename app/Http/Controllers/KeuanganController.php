<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan; // Sesuaikan dengan model Keuangan Anda jika ada

class KeuanganController extends Controller
{
    // Menampilkan halaman Laporan Keuangan
    public function index()
    {
        // Mengambil data keuangan dari database (jika pakai model)
        $keuangan = Keuangan::orderBy('created_at', 'desc')->get();
        return view('admin_keuangan', compact('keuangan'));
    }

    // Menyimpan data keuangan baru dengan jejak nama panitia
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jenis'      => 'required|in:masuk,keluar',
            'jumlah'     => 'required|numeric',
        ]);

        // Mengambil nama dan divisi panitia yang sedang aktif login dari session
        $namaPanitia   = session('user_name', 'Panitia');
        $divisiPanitia = session('user_role', 'Umum');

        // Menggabungkan keterangan asli dengan informasi jejak panitia
        $keteranganLengkap = $request->keterangan . " (Oleh: " . $namaPanitia . " [" . $divisiPanitia . "])";

        // Simpan ke database
        Keuangan::create([
            'keterangan' => $keteranganLengkap,
            'jenis'      => $request->jenis,
            'jumlah'     => $request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Catatan keuangan berhasil disimpan dan tercatat jejak panitianya!');
    }

    // Menghapus data keuangan
    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Catatan keuangan berhasil dihapus!');
    }
}