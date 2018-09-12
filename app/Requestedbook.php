<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestedbook extends Model
{
    protected $fillable = ['book_id','user_id','status','action_date'];


    public function book()
    {
        return $this->hasOne(Book::class,'id','book_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function issuedbook()
    {
        return $this->belongsTo(Issuedbook::class,'book_id','book_id');
    }
}
