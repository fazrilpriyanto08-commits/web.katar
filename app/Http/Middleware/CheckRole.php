<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login berdasarkan session manual kita
        if (!session('is_admin')) {
            return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu!']);
        }

        $userRole = session('user_role'); // contoh: 'admin' atau 'panitia'

        // Jika role user saat ini diizinkan, Lanjutkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses, lempar kembali dengan pesan error
        return redirect('/admin/pendaftar')->with('error', 'Kamu tidak memiliki akses ke halaman ini!');
    }
}