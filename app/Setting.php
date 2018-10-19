<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
      'site_name',
      'email',
      'phone',
      'per_page',
      'currency',
      'home_per_page',
      'blog_per_page',
      'withsidebar_per_page'
    ];
}
