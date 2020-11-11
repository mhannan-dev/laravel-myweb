<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Portfolio extends Model
{

    protected $table = 'portfolio_contents';

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = $this->slugify($value);
    }

    private function slugify($value){
        $slug = str_replace(' ', '-', strtolower($value));
        $count = Category::where('slug', 'LIKE','%'.$slug.'%')->count();
        $suffix = $count ? $count+1 : '';
        $slug .= $suffix;
        return $slug;
    }

    public function categories() {
        return $this->belongsTo('App\Models\Category','category_id')->withDefault();
    }


}
