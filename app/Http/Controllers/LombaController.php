<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Pengumuman;

class LombaController extends Controller
{
    public function index()
    {
        $daftarLomba = Lomba::all();
        // Ambil data pengumuman terbaru
        $pengumumans = Pengumuman::latest()->get();

        // Kirim BOTH (daftarLomba DAN pengumumans) ke view welcome
        return view("welcome", compact("daftarLomba", "pengumumans"));
    }

    public function adminIndex()
    {
        $pendaftars = \App\Models\Pendaftar::latest()->get();
        $pengumumans = Pengumuman::latest()->get();
        return view('admin_pendaftar', compact('pendaftars', 'pengumumans'));
        }
    }   