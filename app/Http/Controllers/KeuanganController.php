<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Http;

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

        $statusKas = (strtolower($request->jenis) == 'masuk' || strtolower($request->jenis) == 'pemasukan') ? 'Masuk' : 'Keluar';

        // Simpan ke database lokal
        Keuangan::create([
            'keterangan' => $request->keterangan,
            'jenis'      => $statusKas,
            'jumlah'     => $request->jumlah,
        ]);

        $keteranganLengkap = "[" . strtoupper($statusKas) . "] " . $request->keterangan . " (Oleh: " . $namaPanitia . " [" . $divisiPanitia . "])";

        // Catat ke Log Aktivitas
        ActivityLog::create([
            'user_name' => $namaPanitia,
            'action'    => 'Menambahkan catatan keuangan ' . $statusKas . ': ' . $request->keterangan . ' (Rp ' . number_format($request->jumlah, 0, ',', '.') . ')'
        ]);

        // ---- URL WEB APP GOOGLE SHEETS ----
        $webAppUrl = 'https://script.google.com/macros/s/AKfycbx1LDcVbkBaOalenE0FfP8DRw3aME6GId4G5mQhKes-B6yhcrpWweWI4z5cgcqJ8nVt/exec'; 

        try {
            Http::post($webAppUrl, [
                'type'       => 'keuangan',
                'tanggal'    => date('Y-m-d H:i:s'),
                'keterangan' => $keteranganLengkap,
                'nominal'    => $request->jumlah,
            ]);
        } catch (\Exception $e) {}
        // -----------------------------------

        return redirect()->back()->with('success', 'Catatan keuangan berhasil disimpan!');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::find($id);
        
        if ($keuangan) {
            $ket = $keuangan->keterangan ?? 'Catatan Keuangan';
            $keuangan->delete();

            ActivityLog::create([
                'user_name' => session('user_name', 'Admin Panitia'),
                'action'    => 'Menghapus catatan keuangan: ' . $ket
            ]);
        }

        return redirect()->back()->with('success', 'Catatan keuangan berhasil dihapus!');
    }
}