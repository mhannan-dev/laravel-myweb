<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slugify($value);
    }

    private function slugify($value){
        $name = str_replace(' ', '-', strtolower($value));
        $count = Tag::where('name', 'LIKE','%'.$name.'%')->count();
        $suffix = $count ? $count+1 : '';
        $name .= $suffix;
        return $name;
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }
}
