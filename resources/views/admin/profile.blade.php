<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Panitia - Katar 012</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
            <div>
                <h1 class="text-2xl font-black text-white">Pengaturan Profil Panitia</h1>
                <p class="text-xs text-slate-400">Kelola informasi akun dan keamanan password kamu.</p>
            </div>
            <a href="/admin/dashboard" class="px-4 py-2 rounded-xl bg-slate-900 border border-slate-800 text-xs font-semibold text-slate-300 hover:text-white">
                <i class="fa-solid fa-arrow-left mr-1.5"></i> Kembali ke Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold">
                <i class="fa-solid fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-400 text-xs font-semibold">
                <i class="fa-solid fa-triangle-exclamation mr-1"></i> Terjadi kesalahan, periksa kembali inputan kamu.
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Form Update Profil -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h2 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-user-pen text-red-500"></i> Informasi Profil
                </h2>
                <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:border-red-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:border-red-500 outline-none" required>
                    </div>
                    <button type="submit" class="w-full py-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs shadow-lg shadow-red-600/30 transition-all">
                        Simpan Perubahan Profil
                    </button>
                </form>
            </div>

            <!-- Form Ganti Password -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-xl">
                <h2 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-key text-amber-500"></i> Keamanan & Password
                </h2>
                <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Password Lama</label>
                        <input type="password" name="current_password" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:border-amber-500 outline-none" required>
                        @error('current_password')
                            <span class="text-[10px] text-red-400 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Password Baru</label>
                        <input type="password" name="password" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:border-amber-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:border-amber-500 outline-none" required>
                    </div>
                    <button type="submit" class="w-full py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-amber-400 border border-slate-700 font-bold text-xs transition-all">
                        Ubah Password
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>