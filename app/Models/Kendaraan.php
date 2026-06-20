<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'user_id',
        'plat_nomor',
        'jenis',
        'merk',
        'warna',
        'status',
        'qr_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}