<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = DB::table('activity_logs')->orderBy('created_at', 'desc')->get();

        // Diubah langsung ke 'logs' karena filenya ada di luar folder admin
        return view('logs', compact('logs'));
    }
}