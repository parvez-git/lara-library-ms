<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name','slug'];


    public function books()
    {
        return $this->belongsToMany('App\Book')->withTimestamps();
    }
=======
    protected $fillable = ['name'];
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
}
