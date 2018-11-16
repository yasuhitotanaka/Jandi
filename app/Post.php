<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('title', 'url', 'description', 'user');

    public function comments() {
      return $this->hasMany('App\Comment');
    }
}
