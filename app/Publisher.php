<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name','slug','address'];

    public function book()
    {
        return $this->belongsTo(Book::class,'id','publisher_id');
    }
}
