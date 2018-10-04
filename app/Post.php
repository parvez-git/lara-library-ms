<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'short_content',
        'status',
        'published_on',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
