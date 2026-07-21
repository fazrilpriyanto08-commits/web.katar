<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan kolom-kolom ini diisi data
    protected $fillable = ['nama_warga', 'nomor_hp', 'rt_rw', 'lomba_id'];
}