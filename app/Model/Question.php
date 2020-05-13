<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'] ;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function replies()
    {
       return $this->hasMany('App\Model\Reply');
    }

    public function Category()
    {
      return $this->belongsTo('App\Model\Category');
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
