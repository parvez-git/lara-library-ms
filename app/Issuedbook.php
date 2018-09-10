<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issuedbook extends Model
{
    protected $fillable = [
      'book_id',
      'user_id',
      'issued_date',
      'expiry_date',
      'return_date',
      'penalty_money',
      'status',
    ];

    public function book()
    {
        return $this->hasOne(Book::class,'id','book_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function issuedbooks()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
