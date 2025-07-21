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
        // 'jumlah_eksemplar',
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

    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }

        // Jumlah seluruh eksemplar (book_copies)
    public function jumlahEksemplar()
    {
        return $this->copies()->count();
    }

    // Jumlah eksemplar yang tersedia
    public function tersedia()
    {
        return $this->copies()->where('status', 'tersedia')->count();
    }

    // Jumlah eksemplar yang sedang dipinjam
    public function dipinjam()
    {
        return $this->copies()->where('status', 'dipinjam')->count();
    }

    // Jumlah eksemplar yang telah dikembalikan
    public function dikembalikan()
    {
        return $this->copies()->where('status', 'dikembalikan')->count();
    }



}
