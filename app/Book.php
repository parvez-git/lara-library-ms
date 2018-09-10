<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
<<<<<<< HEAD
      'title', 'slug', 'subtitle', 'ISBN', 'series_id', 'publisher_id',
      'author_id', 'edition', 'published_year', 'pages', 'binding',
      'quantity', 'price', 'language_id', 'description', 'image',
    ];


    public function genres()
    {
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    public function author()
    {
        return $this->hasOne('App\Author','id','author_id');
    }

    public function publisher()
    {
        return $this->hasOne('App\Publisher','id','publisher_id');
    }

    public function language()
    {
        return $this->hasOne('App\Language','id','language_id');
    }

    public function issuedbooks()
    {
        return $this->hasMany('App\Issuedbook', 'book_id', 'id');
    }
=======
      'title',
      'subtitle',
      'ISBN',
      'series',
      'publisher',
      'author_id',
      'genre',
      'edition',
      'published_year',
      'pages',
      'binding',
      'quantity',
      'price',
      'language',
      'description',
      'image',
    ];
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
}
