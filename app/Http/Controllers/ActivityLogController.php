<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Ambil data log aktivitas diurutkan dari yang terbaru
        $logs = DB::table('activity_logs')->orderBy('created_at', 'desc')->get();

        return view('admin.logs', compact('logs'));
    }
}