<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    // Simpan Form dari Warga
    public function store(Request $request)
    {
        $request->validate([
            'nama_orang_tua' => 'required|string|max:255',
            'no_wa'          => 'required|string|max:20',
            'nominal_donasi' => 'required|numeric|min:10000',
            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti_transfer')) {
            $buktiPath = $request->file('bukti_transfer')->store('bukti_donasi', 'public');
        }

        Donasi::create([
            'nama_orang_tua' => $request->nama_orang_tua,
            'no_wa'          => $request->no_wa,
            'nama_anak'      => $request->nama_anak,
            'umur_anak'      => $request->umur_anak,
            'nominal_donasi' => $request->nominal_donasi,
            'bukti_transfer' => $buktiPath,
            'catatan'        => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas partisipasi dan donasinya!');
    }

    // Tampilkan List Donasi di Dashboard Admin
    public function indexAdmin()
    {
        $donasis = Donasi::latest()->get();
        $totalDonasi = Donasi::where('status', 'Diterima')->sum('nominal_donasi');
        
        return view('admin_donasi', compact('donasis', 'totalDonasi'));
    }

    // Update Status Donasi (Diterima / Ditolak)
    public function updateStatus(Request $request, $id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status donasi berhasil diperbarui!');
    }
}