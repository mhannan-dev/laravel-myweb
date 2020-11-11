<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    protected $table = 'categories';

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->slugify($value);
    }

    private function slugify($value){
        $slug = str_replace(' ', '-', strtolower($value));
        $count = Category::where('slug', 'LIKE','%'.$slug.'%')->count();
        $suffix = $count ? $count+1 : '';
        $slug .= $suffix;
        return $slug;
    }


    public function blog_posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }

}
