<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    protected $fillable = [
        'loan_id', 
        'tanggal_pengembalian', 
        'status',
        ];

         protected $casts = [
        'tanggal_pengembalian' => 'datetime',
        ];

    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class);
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
