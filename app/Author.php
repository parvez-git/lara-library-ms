<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
      'name',
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

    public function book()
    {
        return $this->belongsTo(Book::class,'id','author_id');
    }
}
