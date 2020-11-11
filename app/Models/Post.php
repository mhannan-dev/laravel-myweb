<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'category_id','tag_id','image', 'body', 'status'

    ];

    protected $table = 'posts';

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->slugify($value);
    }

    private function slugify($value){
        $slug = str_replace(' ', '-', strtolower($value));
        $count = Post::where('slug', 'LIKE','%'.$slug.'%')->count();
        $suffix = $count ? $count+1 : '';
        $slug .= $suffix;
        return $slug;
    }


    public function categories() {
        return $this->belongsTo('App\Models\Category','category_id')->withDefault();
    }

    public function tags() {
        return $this->belongsTo('App\Models\Tag','tag_id')->withDefault();
    }

    public function comments()
   {
       return $this->hasMany('App\Models\Comment');
   }



}
