<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = [
        'category_id',
        'rack_id',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jumlah_eksemplar',
        'deskripsi',
        'cover_buku',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

}
