<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Kendaraan;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'no_kartu',
        'qr_code',
        'status',
        'foto',
        'shift',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}