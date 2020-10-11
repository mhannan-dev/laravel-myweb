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
        //dd($data);
        return view('backend/pages/about/index')->with('data', $data);
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
        $about->status = $request->status;

        $about->skill_id = 1;
        $about->save();
        //dd($about);

        toast('Data Added successfully !!','success');
        return redirect()->route('admin.about.page');

    }

    public function delete($id)
    {
        $delete_row = About::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }

        //session()->flash('success', 'Data has deleted successfully !!');
        toast('Data has deleted successfully !!','success');
        return back();

    }

    public function edit($id)
    {
        $data_list = About::find($id);
        if (!is_null($data_list)) {

            return view('backend.pages.about.edit', compact('data_list'));
        }else {

            return redirect()->route('admin.about.page');
        }
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
            'status'     => 'required',
        ]);

        $data_list = About::find($id);
        $data_list->title = $request->title;
        $data_list->description = $request->description;
        $data_list->status = $request->status;

        $data_list->save();
        //dd($data_list);

        toast('Data has updated successfully !!','success');
        return redirect()->route('admin.about.page',compact('data_list'));

    }




}
