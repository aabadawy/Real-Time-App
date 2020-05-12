<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function replies()
    {
       return $this->hasMany('App\Reply');
    }

    public function Category()
    {
      return $this->belongsTo('App\Category');
    }
}
