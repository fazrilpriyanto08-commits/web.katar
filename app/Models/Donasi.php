<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_orang_tua',
        'no_wa',
        'nama_anak',
        'umur_anak',
        'nominal_donasi',
        'bukti_transfer',
        'catatan',
        'status',
    ];
}