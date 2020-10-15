<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::orderBy('id', 'desc')->get();
        //dd($data);
        //return view('backend/pages/service/index')->with('data', $data);
        return view('backend/pages/service/index', compact('data', 'data'))->with('no', 1);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pages/blog/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'user_id'       => 'required|numeric',
            'title'         => 'required|max:150',
            'slug'          => 'slug',
            'image'         => 'required',
            'body'          => 'required',
            'status'        => 'required',

        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        if(isset($image))
        {
            //make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
            //$postImage = Image::make($image)->resize(1600,1066)->save();
            $postImage = Image::make($image)->resize(1600,1066)->save( $imageName,90);
            Storage::disk('public')->put('post/'.$imageName,$postImage);
        } else {
            $imageName = "default.png";
        }

        $post = new Post();
        //$post->user_id = 1;
        //$post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();

        toast('Data saved successfully !!','success');
        return redirect()->route('admin.blog.list',compact('data_list'));
       // return $request->all();


    }

    public function delete($id)
    {
        $delete_row = Service::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }

        toast('Data has deleted successfully !!','success');
        return back();

    }

    public function edit($id)
    {
        $data_list = Service::find($id);
        if (!is_null($data_list)) {

            return view('backend.pages.service.edit', compact('data_list'));
        }else {

            return redirect()->route('admin.service.page');
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




}
