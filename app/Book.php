<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
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

}
