<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function reply()
    {
        return $this->belongsTo('App\Reply');
    }
}
