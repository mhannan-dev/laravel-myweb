<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
      return view('frontend/pages/index');
    }

    public function about(){
      return view('frontend/pages/about');
    }

    public function services(){
      return view('frontend/pages/services');
    }

    public function portfolio(){
      return view('frontend/pages/portfolio');
    }

    public function blog(){
      return view('frontend/pages/blog');
    }

    public function contact(){
      return view('frontend/pages/contact');
    }
}
