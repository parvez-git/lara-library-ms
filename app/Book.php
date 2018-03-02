<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
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
}
