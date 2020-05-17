<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class Question extends Model
{
    // protected $guarded = ['id' , 'created_at' ,'updated_at'] ;
    protected $fillable =  ['title' , 'slug' ,'body' , 'usre_id' , 'category_id'];
    protected static function boot(){
        parent::boot();
        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });
    }

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
        return "/question/$this->slug";
    }


    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans();
    }
}
