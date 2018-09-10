<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
      'name',
<<<<<<< HEAD
      'slug',
      'bio',
      'country_id',
      'language_id',
      'dateofbirth',
      'image'
    ];


    public function country()
    {
        return $this->hasOne('App\Country','id','country_id');
    }

    public function language()
    {
        return $this->hasOne('App\Language','id','language_id');
    }
=======
      'bio',
      'country',
      'language',
      'dateofbirth',
      'image'
    ];
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
}
