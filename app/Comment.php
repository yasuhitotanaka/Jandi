<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = array('post_id', 'comment', 'user');

    public function post() {
      return $this->belongsTo('App\Post');
    }
}
