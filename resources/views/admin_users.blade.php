<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User Panitia - Katar Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex min-h-screen">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center text-white font-black shadow-lg shadow-red-600/30">KT</div>
                <div>
                    <h1 class="font-black text-sm text-white">KATAR PANEL</h1>
                    <p class="text-[10px] text-slate-400">Admin Control Center</p>
                </div>
            </div>

            <!-- PROFIL USER YANG SEDANG LOGIN (MUNCUL OTOMATIS) -->
            <div class="mb-6 p-3 rounded-xl bg-slate-950/60 border border-slate-800 flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white font-bold text-xs shadow-md">
                    {{ substr(session('user_name', 'Admin'), 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <h2 class="font-bold text-xs text-white truncate">{{ session('user_name', 'Panitia RT 012') }}</h2>
                    <span class="inline-block px-2 py-0.5 rounded text-[9px] font-extrabold uppercase bg-red-500/10 border border-red-500/20 text-red-400 mt-0.5">
                        {{ session('user_role', 'Panitia') }}
                    </span>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="/admin/pendaftar" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-users text-sm"></i> <span>Pendaftar Lomba</span>
                </a>
                <a href="/admin/donasi" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-hand-holding-dollar text-sm"></i> <span>Donasi & Data Anak</span>
                </a>
                <a href="/admin/doorprize" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-compact-disc text-sm text-amber-400"></i> <span>Spin Wheel (Doorprize)</span>
                </a>
                <a href="/admin/inventaris" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-boxes-stacked text-sm"></i> <span>Inventaris Perlap</span>
                </a>
                <a href="/admin/keuangan" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-wallet text-sm"></i> <span>Laporan Keuangan</span>
                </a>
                <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600/10 text-red-400 border border-red-500/20 text-xs font-bold transition-all">
                    <i class="fa-solid fa-user-gear text-sm"></i> <span>Kelola User Panitia</span>
                </a>
            </nav>
        </div>

        <form action="/logout" method="POST" class="pt-6 border-t border-slate-800">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-slate-500 hover:text-red-400 text-xs font-bold transition-colors flex items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Keluar / Logout</span>
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6 lg:p-10">
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-black text-white">Kelola User Panitia</h1>
            <p class="text-slate-400 text-xs mt-1">Atur data akun panitia, divisi, dan pembaruan password.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- FORM TAMBAH USER -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 h-fit">
                <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-user-plus text-red-400"></i> Tambah Panitia Baru
                </h3>

                <form action="/admin/users" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</label>
                        <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Email / Username Login</label>
                        <input type="email" name="email" required placeholder="panitia@katar012.com" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Password</label>
                        <input type="password" name="password" required placeholder="******" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Pilih Divisi / Jabatan</label>
                        <select name="role" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil">Wakil Ketua</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="PDD">PDD (Publikasi & Dokumentasi)</option>
                            <option value="Konsum">Konsumsi</option>
                            <option value="Perlap">Perlap (Peralatan & Perlengkapan)</option>
                            <option value="Acara">Acara / Lomba</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs transition-all shadow-lg shadow-red-600/20">
                        Simpan Panitia
                    </button>
                </form>
            </div>

            <!-- TABEL DAFTAR USER -->
            <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-users-gear text-red-400"></i> Daftar Akun Panitia Aktif
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-slate-950/60 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="p-3">#</th>
                                <th class="p-3">Nama Panitia</th>
                                <th class="p-3">Email / Login</th>
                                <th class="p-3">Divisi</th>
                                <th class="p-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 text-slate-300">
                            @forelse($users ?? [] as $index => $u)
                                <tr class="hover:bg-slate-800/30 transition-colors">
                                    <td class="p-3 text-slate-500">{{ $index + 1 }}</td>
                                    <td class="p-3 font-bold text-white">{{ $u->name }}</td>
                                    <td class="p-3 text-slate-400 font-mono">{{ $u->email }}</td>
                                    <td class="p-3">
                                        <span class="px-2.5 py-1 rounded-full font-bold text-[10px] uppercase bg-red-500/10 border border-red-500/20 text-red-400">
                                            {{ $u->role ?? 'Panitia' }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-right space-x-2">
                                        <!-- Tombol Ganti Password -->
                                        <button onclick="openPasswordModal('{{ $u->id }}', '{{ $u->name }}')" class="text-amber-400 hover:text-amber-300 font-bold p-1" title="Ganti Password">
                                            <i class="fa-solid fa-key"></i>
                                        </button>

                                        <!-- Tombol Hapus -->
                                        <form action="/admin/users/{{ $u->id }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus akun panitia ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-400 hover:text-rose-300 p-1 font-bold" title="Hapus Akun">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-slate-500">Belum ada akun panitia yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL GANTI PASSWORD -->
    <div id="passwordModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 w-full max-w-md shadow-2xl">
            <h3 class="text-sm font-bold text-white mb-2 flex items-center gap-2">
                <i class="fa-solid fa-key text-amber-400"></i> Ganti Password: <span id="modalUserName" class="text-red-400"></span>
            </h3>
            <p class="text-slate-400 text-xs mb-4">Masukkan password baru untuk akun panitia ini.</p>

            <form id="passwordForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Password Baru</label>
                    <input type="password" name="password" required placeholder="Minimal 4 karakter" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closePasswordModal()" class="w-1/2 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs transition-all">
                        Batal
                    </button>
                    <button type="submit" class="w-1/2 py-2.5 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs transition-all shadow-lg shadow-red-600/20">
                        Simpan Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openPasswordModal(userId, userName) {
            const modal = document.getElementById('passwordModal');
            const form = document.getElementById('passwordForm');
            const nameSpan = document.getElementById('modalUserName');

            form.action = '/admin/users/' + userId;
            nameSpan.innerText = userName;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closePasswordModal() {
            const modal = document.getElementById('passwordModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

</body>
</html>