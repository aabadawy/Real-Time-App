<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected static function boot(){
        parent::boot();
        static::creating(function($category){
            $category->slug = str_slug($category->name);
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
