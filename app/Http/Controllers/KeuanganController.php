<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    // Tampilkan Halaman Keuangan Admin
    public function index()
    {
        $transaksis = Keuangan::orderBy('tanggal', 'desc')->get();

        $totalPemasukan = Keuangan::where('jenis', 'Pemasukan')->sum('nominal');
        $totalPengeluaran = Keuangan::where('jenis', 'Pengeluaran')->sum('nominal');
        $sisaSaldo = $totalPemasukan - $totalPengeluaran;

        return view('admin_keuangan', compact('transaksis', 'totalPemasukan', 'totalPengeluaran', 'sisaSaldo'));
    }

    // Simpan Transaksi Baru
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255',
            'jenis'      => 'required|in:Pemasukan,Pengeluaran',
            'nominal'    => 'required|numeric|min:1',
            'tanggal'    => 'required|date',
        ]);

        Keuangan::create([
            'keterangan' => $request->keterangan,
            'jenis'      => $request->jenis,
            'nominal'    => $request->nominal,
            'tanggal'    => $request->tanggal,
            'kategori'   => $request->kategori,
            'catatan'    => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Catatan keuangan berhasil ditambahkan!');
    }

    // Hapus Transaksi
    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Catatan transaksi berhasil dihapus!');
    }
}