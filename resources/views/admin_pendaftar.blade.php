<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Karang Taruna RT 012</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col md:flex-row">

    <!-- Overlay Mobile Sidebar -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-950/80 z-40 hidden md:hidden transition-opacity" onclick="toggleSidebar()"></div>

    <!-- Sidebar Admin -->
    <aside id="sidebar" class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-slate-900 border-r border-slate-800 flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div>
            <!-- Header Sidebar -->
            <div class="p-6 border-b border-slate-800/80 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-red-600/20 border border-red-500/30 flex items-center justify-center text-red-500 font-bold text-lg">
                        KT
                    </div>
                    <div>
                        <h2 class="font-bold text-white text-sm">KATAR PANEL</h2>
                        <p class="text-[10px] text-slate-400">Admin Control Center</p>
                    </div>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-white p-2">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Menu Navigasi Lengkap -->
            <nav class="p-4 space-y-1.5">
                <!-- 1. Pendaftar Lomba (Aktif) -->
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600/10 text-red-400 font-semibold border border-red-500/20 text-sm transition-all">
                    <i class="fa-solid fa-users w-5"></i>
                    <span>Pendaftar Lomba</span>
                </a>

                <!-- 2. Donasi & Data Anak -->
                <a href="/admin/donasi" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/60 hover:text-slate-200 font-medium text-sm transition-all">
                    <i class="fa-solid fa-hand-holding-dollar w-5"></i>
                    <span>Donasi & Data Anak</span>
                </a>

                <!-- 3. Spin Wheel / Doorprize -->
                <a href="/doorprize" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/60 hover:text-slate-200 font-medium text-sm transition-all">
                    <i class="fa-solid fa-dharmachakra w-5 text-amber-400"></i>
                    <span>Spin Wheel (Doorprize)</span>
                </a>

                <!-- 4. Inventaris / Perlap -->
                <a href="/inventaris" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/60 hover:text-slate-200 font-medium text-sm transition-all">
                    <i class="fa-solid fa-boxes-stacked w-5 text-blue-400"></i>
                    <span>Inventaris Perlap</span>
                </a>

                <!-- 5. Keuangan -->
                <a href="/admin/keuangan" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/60 hover:text-slate-200 font-medium text-sm transition-all">
                    <i class="fa-solid fa-wallet w-5 text-emerald-400"></i>
                    <span>Laporan Keuangan</span>
                </a>

                <hr class="border-slate-800/80 my-2">

                <!-- 6. Lihat Beranda Utama -->
                <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/60 hover:text-slate-200 font-medium text-sm transition-all">
                    <i class="fa-solid fa-globe w-5"></i>
                    <span>Lihat Web Utama</span>
                </a>
            </nav>
        </div>

        <!-- Tombol Keluar / Logout -->
        <div class="p-4 border-t border-slate-800/80">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-red-500/20 text-slate-300 hover:text-red-400 border border-slate-700 hover:border-red-500/30 font-medium text-xs transition-all">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Keluar / Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Content Utama -->
    <main class="flex-1 min-w-0 flex flex-col min-h-screen">
        
        <!-- Navbar Top Mobile -->
        <header class="bg-slate-900 border-b border-slate-800 p-4 flex items-center justify-between md:hidden sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="p-2 rounded-xl bg-slate-800 text-slate-300 hover:text-white border border-slate-700">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <span class="font-bold text-white text-sm">Dashboard Panitia</span>
            </div>
            <span class="text-[10px] bg-red-500/10 border border-red-500/20 text-red-400 font-semibold px-2.5 py-1 rounded-full">
                RT 012
            </span>
        </header>

        <!-- Area Isian Dashboard -->
        <div class="p-4 sm:p-6 lg:p-8 space-y-6 flex-1">
            
            <!-- Welcome Header & Quick Action -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900/60 border border-slate-800/80 rounded-2xl p-5 backdrop-blur-xl">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-white mb-1">Dashboard Pendaftar Lomba</h1>
                    <p class="text-slate-400 text-xs sm:text-sm">Kelola informasi lomba dan pendaftaran warga RT 012.</p>
                </div>
                <a href="/" target="_blank" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 px-4 py-2.5 rounded-xl text-xs font-semibold transition-all">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Buka Form Warga</span>
                </a>
            </div>

            <!-- Stats Card Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Total Pendaftar Lomba</p>
                        <p class="text-2xl sm:text-3xl font-extrabold text-white">{{ count($pendaftar ?? []) }} <span class="text-sm font-normal text-slate-400">orang</span></p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 text-xl">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>

                <div class="bg-slate-900/80 border border-slate-800 p-5 rounded-2xl flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Status Sistem</p>
                        <p class="text-lg font-bold text-emerald-400 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Terhubung Sheets
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-xl">
                        <i class="fa-solid fa-file-excel"></i>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Pendaftar (Responsive Scroll) -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
                <div class="p-4 sm:p-5 border-b border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-red-400 text-sm"></i>
                        <h3 class="font-bold text-white text-sm sm:text-base">Data Pendaftar Lomba</h3>
                    </div>
                    <span class="text-xs text-slate-400">Geser ke samping &rarr;</span>
                </div>

                <!-- Wrapper Scroll Horizontal -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm text-slate-300">
                        <thead class="bg-slate-950/60 uppercase text-[11px] font-semibold text-slate-400 tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="py-3.5 px-4">#</th>
                                <th class="py-3.5 px-4">Nama Warga</th>
                                <th class="py-3.5 px-4">No. WhatsApp</th>
                                <th class="py-3.5 px-4">RT / RW</th>
                                <th class="py-3.5 px-4">ID Lomba</th>
                                <th class="py-3.5 px-4">Tanggal Daftar</th>
                                <th class="py-3.5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60">
                            @forelse($pendaftar ?? [] as $index => $item)
                                <tr class="hover:bg-slate-800/40 transition-colors">
                                    <td class="py-3.5 px-4 text-slate-500 font-mono">{{ $index + 1 }}</td>
                                    <td class="py-3.5 px-4 font-semibold text-white whitespace-nowrap">{{ $item->nama_warga }}</td>
                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->nomor_hp) }}" target="_blank" class="text-emerald-400 hover:underline flex items-center gap-1.5">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            {{ $item->nomor_hp }}
                                        </a>
                                    </td>
                                    <td class="py-3.5 px-4 whitespace-nowrap text-slate-400">{{ $item->rt_rw ?? 'RT 012 / RW 05' }}</td>
                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <span class="bg-slate-800 border border-slate-700 text-slate-300 px-2.5 py-1 rounded-lg text-xs">
                                            Lomba #{{ $item->lomba_id }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-4 whitespace-nowrap text-slate-400 text-xs">
                                        {{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}
                                    </td>
                                    <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                        <form action="/pendaftar/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pendaftar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 p-2 rounded-lg transition-all">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-slate-500">
                                        Belum ada data pendaftar yang masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer class="p-4 text-center text-xs text-slate-600 border-t border-slate-900 mt-auto">
            Karang Taruna RT 012 Panel &copy; {{ date('Y') }}
        </footer>
    </main>

    <!-- Script Toggle Mobile Sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>