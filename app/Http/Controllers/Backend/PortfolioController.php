<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Traits\UploadTrait;

class PortfolioController extends Controller
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
        $post = Portfolio::all();

        return view('backend/pages/portfolio/index', compact('post'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories =  Category::where('type', 2)->get();
        return view('backend.pages.portfolio.create',compact('categories'));
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
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required',
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

        $post               = new Portfolio();
        $post->title        = $request->title;
        $post->slug         = $slug;
        $post->category_id  = $request->category_id;
        $post->link         = $request->link;
        $post->image        = $imageName.'.'.$image->getClientOriginalExtension();
        $post->type         = $request->type;
        $post->save();
        toast('Data added successfully','success');
        return redirect()->route('admin.portfolio.list');

        //return  $request->all();

    }



    public function edit($id)
    {
        $categories =  Category::where('type', 2)->get();
        //dd($categories);
        $data_list = Portfolio::find($id);
        if (!is_null($data_list)) {

            return view('backend.pages.portfolio.edit', compact('data_list','categories'));
        }else {

            return redirect()->route('admin.portfolio.list');
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
        $delete_row = Portfolio::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }

        toast('Data has deleted successfully !!','success');
        return back();

    }




}
