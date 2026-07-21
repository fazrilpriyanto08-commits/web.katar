<?php

namespace App\Http\Controllers;

// Pastikan baris ini ada agar Controller kenal dengan Model Lomba kamu!
use App\Models\Lomba; 
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        // Ambil data lomba
        $daftarLomba = Lomba::all();

        // Lempar ke halaman welcome
        return view('welcome', compact('daftarLomba'));
    }
}