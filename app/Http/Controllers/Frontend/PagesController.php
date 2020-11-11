<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Service;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
      $data['title'] = "Service";
      //$data['services'] = Service::orderBy('id','desc')->get();
      $data['services'] = DB::select('SELECT * FROM services WHERE status = 1 ORDER BY title DESC');
      //dd($data);
      $home_content = DB::select('SELECT * FROM homes WHERE status = 1 ORDER BY title DESC');
      //dd($home_content);

      return view('frontend.pages.index',$data, compact('home_content'));
    }

    public function about(){
      $data['title'] = "About";
      $data['about'] = About::orderBy('id','desc')->get();
      return view('frontend.pages.about', $data);
    }

    public function services(){
      $data['title'] = "Service";
      $data['services'] = Service::orderBy('id','desc')->get();
      //dd($data);
      return view('frontend.pages.services', $data);
    }

    public function portfolio(){
      $categories =  Category::where('type', 2)->get();
      return view('frontend.pages.portfolio',compact('categories'));
    }

    public function blog(){
      $list = Post::latest()->where('status', 1)->paginate(2);
      $categories =  Category::where('type', 1)->get();
      $random_posts = Post::latest()->where('status', 1)->inRandomOrder()->get();
      return view('frontend.pages.blog', compact('list','random_posts','categories'));
    }

    public function blog_details($slug){
        $detail_post = Post::where('slug',$slug)->first();
        return view('frontend.pages.blog-detail',compact('detail_post'));

    }

    public function postByCategory($slug){
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->where('status', 1)->get();
        //dd($posts);
        return view('frontend.pages.blog', compact('posts','category'));
    }




    public function contact(){
      return view('frontend.pages.contact');
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
                'fullname.required'  => 'Please fillup a fullname',
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
        return view('frontend.pages.contact');
    }
}
