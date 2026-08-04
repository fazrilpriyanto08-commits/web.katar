<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::latest()->paginate(10);
        
        // Mengarahkan ke file view 'logs' sesuai dengan struktur folder kamu
        return view('logs', compact('logs'));
    }
}