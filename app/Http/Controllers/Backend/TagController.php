<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Traits\TagTrait;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    use TagTrait;

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
        $data['title'] = "Tag";
        $data['tags'] = Tag::orderBy('id','desc')->get();
        return view('backend.pages.tag.index', $data);
    }

    public function store(Request $request)
    {
        $this->validaion_check($request);
        $data = new Tag();

        $this->data_process($data, $request);
        toast('Successfully Tag Saved','success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->validaion_check($request);
        $data = Tag::findOrFail($request->tag_id);
        $this->data_process($data, $request);
        toast('Successfully Tag Saved','success');
        return redirect()->back();

    }

    public function destroy(Tag $tag){
        try {
            $tag->delete();
        } catch (Exception $e) {
            toast($e->message(),'error');
            return redirect()->back();
        }
        toast('Successfully Tag Deleted','success');
        return redirect()->back();
    }


}
