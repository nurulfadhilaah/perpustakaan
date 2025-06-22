<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'nama_anggota',
        'nik',
        'no_anggota',
        'alamat',
        'no_hp',
        'email',
        'tgl_lahir',
        'password',
        'foto',
        'ktp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tgl_lahir'   => 'date',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];
}
