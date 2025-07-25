<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
     protected $fillable = [
        'member_id',
        'book_id',
        'admin_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    protected $casts = [
    'tanggal_pinjam' => 'datetime',
    'tanggal_kembali' => 'datetime',
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function bookReturn()
    {
        return $this->hasOne(BookReturn::class);
    }

    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function return()
    {
        return $this->hasOne(\App\Models\BookReturn::class);
    }

}
