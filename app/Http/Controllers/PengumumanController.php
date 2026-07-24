<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Simpan pengumuman baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

\App\Models\Pengumuman::create([
    'judul'    => $request->judul,
    'isi'      => $request->isi,
    'kategori' => $request->kategori ?? 'Info',
]);

        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // Update / Edit pengumuman
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
        ]);

        return redirect()->back()->with('success', 'Pengumuman berhasil diubah!');
    }

    // Hapus pengumuman
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
    }
}