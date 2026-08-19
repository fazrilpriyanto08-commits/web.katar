<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Perlap - Katar Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Inventaris Barang Perlap</h1>
                <p class="text-sm text-slate-400">Manajemen Aset & Peralatan Peringatan HUT RI RT 012</p>
            </div>
            <a href="/admin/dashboard" class="bg-slate-800 hover:bg-slate-700 text-sm px-4 py-2 rounded-lg font-medium transition">← Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="bg-emerald-600 text-white p-3 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Form Tambah Barang -->
            <div class="bg-slate-800 p-6 rounded-xl border border-slate-700 h-fit">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">➕ Tambah Barang Baru</h2>
                <form action="/admin/inventaris" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1">Nama Barang</label>
                        <input type="text" name="nama_barang" required class="w-auto w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1">Kategori / Asal Barang</label>
                        <input type="text" name="asal" required placeholder="Contoh: Aset Katar / RT" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Jumlah</label>
                            <input type="number" name="jumlah" min="1" required value="1" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-300 mb-1">Satuan</label>
                            <input type="text" name="satuan" required placeholder="Pcs / Unit / Buah" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1">Status Barang</label>
                        <select name="status" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                            <option value="Tersedia (Ready)">Tersedia (Ready)</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-300 mb-1">Penanggung Jawab / Keterangan</label>
                        <input type="text" name="pj" placeholder="Nama peminjam / lokasi simpan" class="w-full bg-slate-900 border border-slate-700 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-amber-500">
                    </div>
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold py-2.5 rounded-lg text-sm transition">Simpan Barang</button>
                </form>
            </div>

            <!-- Tabel Daftar Barang -->
            <div class="lg:col-span-2 bg-slate-800 p-6 rounded-xl border border-slate-700">
                <h2 class="text-lg font-semibold mb-4">📋 Daftar Aset & Equipment</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-slate-700 text-slate-400">
                                <th class="py-3 px-3">#</th>
                                <th class="py-3 px-3">Nama Barang</th>
                                <th class="py-3 px-3">Asal</th>
                                <th class="py-3 px-3">Jumlah</th>
                                <th class="py-3 px-3">Status</th>
                                <th class="py-3 px-3">PJ / Ket</th>
                                <th class="py-3 px-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inventaris as $index => $item)
                            <tr class="border-b border-slate-700/50 hover:bg-slate-750">
                                <td class="py-3 px-3">{{ $index + 1 }}</td>
                                <td class="py-3 px-3 font-medium text-white">{{ $item->nama_barang }}</td>
                                <td class="py-3 px-3 text-slate-300">{{ $item->asal }}</td>
                                <td class="py-3 px-3 font-semibold">{{ $item->jumlah }} {{ $item->satuan }}</td>
                                <td class="py-3 px-3">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                        {{ $item->status == 'Tersedia (Ready)' ? 'bg-emerald-500/20 text-emerald-400' : ($item->status == 'Dipinjam' ? 'bg-amber-500/20 text-amber-400' : 'bg-rose-500/20 text-rose-400') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-slate-300 text-xs">{{ $item->pj ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">
                                    <form action="/admin/inventaris/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-2.5 py-1 rounded text-xs transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-8 text-slate-400">Belum ada data inventaris barang.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>