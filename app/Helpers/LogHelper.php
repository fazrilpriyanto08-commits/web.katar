<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class LogHelper
{
    public static function catat($aktivitas)
    {
        // Ambil data user dari session yang sedang login
        $userId = session('user_id') ?? session('id');
        $userName = session('user_name') ?? 'Administrator';
        $userRole = session('user_role') ?? 'admin';

        DB::table('activity_logs')->insert([
            'user_id' => $userId,
            'nama_panitia' => $userName,
            'role' => $userRole,
            'aktivitas' => $aktivitas,
            'ip_address' => request()->ip(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}