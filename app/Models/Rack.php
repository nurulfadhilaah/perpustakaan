<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
   protected $fillable = [
        'kode_rak', 
        'nama_rak'
    ];
}
