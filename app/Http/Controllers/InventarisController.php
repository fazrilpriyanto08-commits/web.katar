<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Http;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderBy('created_at', 'desc')->get();
        return view('admin.admin_inventaris', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'asal'        => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:1',
            'satuan'      => 'required|string|max:50',
            'status'      => 'required|string',
            'pj'          => 'nullable|string|max:255',
        ]);

        $namaPanitia = session('user_name', 'Panitia');

        // Simpan ke database lokal
        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'asal'        => $request->asal,
            'jumlah'      => $request->jumlah,
            'satuan'      => $request->satuan,
            'status'      => $request->status,
            'pj'          => $request->pj,
        ]);

        // Catat ke Log Aktivitas
        ActivityLog::create([
            'user_name' => $namaPanitia,
            'action'    => 'Menambahkan inventaris: ' . $request->nama_barang . ' (' . $request->jumlah . ' ' . $request->satuan . ')'
        ]);

        // URL Web App Google Apps Script kamu
        $webAppUrl = 'https://script.google.com/macros/s/AKfycbx1LDcVbkBaOalenE0FfP8DRw3aME6GId4G5mQhKes-B6yhcrpWweWI4z5cgcqJ8nVt/exec'; 

        try {
            Http::post($webAppUrl, [
                'type'        => 'inventaris',
                'tanggal'     => date('Y-m-d H:i:s'),
                'nama_barang' => $request->nama_barang,
                'asal'        => $request->asal,
                'jumlah'      => $request->jumlah . ' ' . $request->satuan,
                'status'      => $request->status,
                'pj'          => $request->pj ?? '-',
            ]);
        } catch (\Exception $e) {}

        return redirect()->back()->with('success', 'Barang inventaris berhasil disimpan & disinkronkan!');
    }

    public function destroy($id)
    {
        $barang = Inventaris::find($id);
        
        if ($barang) {
            $nama = $barang->nama_barang;
            $barang->delete();

            ActivityLog::create([
                'user_name' => session('user_name', 'Admin Panitia'),
                'action'    => 'Menghapus inventaris: ' . $nama
            ]);
        }

        return redirect()->back()->with('success', 'Barang inventaris berhasil dihapus!');
    }
}