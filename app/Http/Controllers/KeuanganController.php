<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangan = Keuangan::orderBy('created_at', 'desc')->get();
        return view('admin_keuangan', compact('keuangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jenis'      => 'required',
            'jumlah'     => 'required|numeric',
        ]);

        $namaPanitia   = session('user_name', 'Panitia');
        $divisiPanitia = session('user_role', 'Umum');

        $statusKas = (strtolower($request->jenis) == 'masuk' || strtolower($request->jenis) == 'pemasukan') ? '[KAS MASUK]' : '[KAS KELUAR]';
        $keteranganLengkap = $statusKas . " " . $request->keterangan . " (Oleh: " . $namaPanitia . " [" . $divisiPanitia . "])";

        // Menggunakan query mentah (DB insert) khusus untuk tabel keuangans agar mutlak mengabaikan Model dan Constraint
        \DB::table('keuangans')->insert([
            'keterangan' => $keteranganLengkap,
            'nominal'    => $request->jumlah,
            'tanggal'    => date('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Catatan keuangan berhasil disimpan!');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Catatan keuangan berhasil dihapus!');
    }
}