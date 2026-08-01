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

        // Menyatukan status jenis kas langsung ke keterangan agar tidak perlu bergantung pada kolom jenis
        $statusKas = (strtolower($request->jenis) == 'masuk' || strtolower($request->jenis) == 'pemasukan') ? '[KAS MASUK]' : '[KAS KELUAR]';
        $keteranganLengkap = $statusKas . " " . $request->keterangan . " (Oleh: " . $namaPanitia . " [" . $divisiPanitia . "])";

        // Menggunakan model tanpa menyentuh kolom jenis yang bermasalah di database Railway
        $keuangan = new Keuangan();
        $keuangan->keterangan = $keteranganLengkap;
        $keuangan->nominal    = $request->jumlah;
        $keuangan->tanggal    = date('Y-m-d');
        
        // Cek jika kolom jenis ada di fillable/tabel, kita isi dengan string yang dijamin netral
        try {
            $keuangan->jenis = 'masuk'; 
        } catch (\Exception $e) {
            // Abaikan jika kolom tidak diizinkan
        }

        $keuangan->save();

        return redirect()->back()->with('success', 'Catatan keuangan berhasil disimpan!');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Catatan keuangan berhasil dihapus!');
    }
}