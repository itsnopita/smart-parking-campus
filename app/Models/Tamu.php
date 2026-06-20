<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamu';

    protected $fillable = [
        'nama',
        'no_hp',
        'instansi',
        'plat_nomor',
        'jenis',
        'qr_code'
    ];
}