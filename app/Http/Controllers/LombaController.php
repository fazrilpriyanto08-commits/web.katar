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
}
