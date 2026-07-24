<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;

class LombaController extends Controller
{
    public function index()
    {
        $daftarLomba = Lomba::all();
        return view("welcome", compact("daftarLomba"));
    }


public function adminIndex()
{
    $pendaftars = \App\Models\Pendaftar::latest()->get();
    $pengumumans = \App\Models\Pengumuman::latest()->get(); // Tambahkan baris ini
    return view('admin_pendaftar', compact('pendaftars', 'pengumumans'));
    }
}