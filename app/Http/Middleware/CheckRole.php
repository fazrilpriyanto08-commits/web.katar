<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!session('is_admin')) {
            return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu!']);
        }

        $userRole = session('user_role');

        // Jika role cocok dengan yang diizinkan, lanjut
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika bukan admin tapi coba masuk area admin, alihkan
        return redirect('/admin/pendaftar')->with('error', 'Kamu tidak memiliki akses ke halaman ini!');
    }
}