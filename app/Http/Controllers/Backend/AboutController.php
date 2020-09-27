<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::orderBy('id', 'desc')->get();
        return view('backend/pages/home/index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pages/about/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;
        $about->skill_id = 1;
        $about->save();
        //dd($home);
        session()->flash('success', 'Added successfully !!');
        return redirect()->route('about_data_list');

    }





}
