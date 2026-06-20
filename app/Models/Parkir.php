<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan;

class Parkir extends Model
{
    protected $table = 'parkir';

    protected $fillable = [

        'user_id',

        'kendaraan_id',

        'plat_nomor',

        'tipe_user',

        'waktu_masuk',

        'waktu_keluar',

        'status',

        'biaya'

    ];

    protected $casts = [
    'waktu_masuk' => 'datetime',
    'waktu_keluar' => 'datetime',
];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}