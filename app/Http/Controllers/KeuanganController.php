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

        $keteranganLengkap = $request->keterangan . " (Oleh: " . $namaPanitia . " [" . $divisiPanitia . "])";

        // MEMAKSA NILAI JADI 'masuk' ATAU 'keluar' TANPA TAPI TANPA NANTI
        $inputJenis = strtolower(trim($request->jenis));
        if ($inputJenis == 'pemasukan' || $inputJenis == 'masuk') {
            $jenisTransaksi = 'masuk';
        } else {
            $jenisTransaksi = 'keluar';
        }

        Keuangan::create([
            'keterangan' => $keteranganLengkap,
            'jenis'      => $jenisTransaksi,
            'nominal'    => $request->jumlah,
            'tanggal'    => date('Y-m-d'), 
        ]);

        return redirect()->back()->with('success', 'Catatan keuangan berhasil disimpan dan tercatat jejak panitianya!');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Catatan keuangan berhasil dihapus!');
    }
}