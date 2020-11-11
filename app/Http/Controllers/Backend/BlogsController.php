<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use App\Http\Traits\UploadTrait;

class BlogsController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::orderBy('id', 'desc')->get();
        //dd($data);
        return view('backend/pages/blog/index', compact('data', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories =  Category::where('type', 1)->get();
        $tags = Tag::all();
        return view('backend.pages.blog.create',compact('categories','tags'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {

        $this->validate($request,[
            'title' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
            'status' => 'required',
        ]);

        $slug = Str::slug($request->title);
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time();
            $folder = '/upload/';
            $filePath = $folder . $imageName. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $imageName);
            $post->image = $filePath;
        }

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->tag_id = $request->tag_id;
        $post->image = $imageName.'.'.$image->getClientOriginalExtension();
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        toast('Post added successfully','success');

        return redirect()->route('admin.blog.list');

        //return  $request->all();

    }

    public function edit($id)
    {
        $data_list = Post::find($id);

        $categories = Category::where('type', 1)->get();
        //$categories = Category::all();

        //dd($data_list);
        $tags =  Tag::all();
        if (!is_null($data_list)) {

            return view('backend.pages.blog.edit', compact('data_list','categories','tags'));

        }else {

            return redirect()->route('admin.blog.list');
        }
    }






    public function update(Request $request, $id)
    {

        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
            'status'     => 'required',
        ]);

        $data_list = Service::find($id);
        $data_list->icon = $request->icon;
        $data_list->title = $request->title;
        $data_list->description = $request->description;
        $data_list->status = $request->status;

        $data_list->save();
        //dd($data_list);

        toast('Data hasbeen updated successfully !!','success');
        return redirect()->route('admin.service.page',compact('data_list'));

    }

    public function delete($id)
    {
        $delete_row = Post::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }

        toast('Data has deleted successfully !!','success');
        return back();

    }




}
