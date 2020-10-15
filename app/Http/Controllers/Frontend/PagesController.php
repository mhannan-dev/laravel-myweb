<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
      $home_content = DB::select('SELECT * FROM homes WHERE status = 1 ORDER BY title DESC');
      //dd($home_content);

      return view('frontend/pages/index', compact('home_content'));
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

    public function contact_mail(Request $request){
        $request->validate([
            'message'         => 'required',
            'fullname'     => 'required',
            'email'     => 'required',
            'subject' => 'required|max:150'
        ],
        [
                'message.required'  => 'Please fillup a message',
                'fullname.required'  => 'Please fillup a title',
                'email.required'  => 'Please fillup email',
                'subject' => 'Please enter subject'
        ]);

        $msg = new Contact();
        $msg->message = $request->message;
        $msg->fullname = $request->fullname;
        $msg->status = 0;
        $msg->email = $request->email;
        $msg->subject = $request->subject;

        $msg->save();
        //dd($msg);

        toast('Message sent successfully !!','success');
        return view('frontend/pages/contact');
    }
}
