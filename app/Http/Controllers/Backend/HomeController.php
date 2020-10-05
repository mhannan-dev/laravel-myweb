<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Home::orderBy('id', 'desc')->get();
        return view('backend/pages/home/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backend/pages/dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pages/home/create');
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
            'status'     => 'required',
        ]);

        $home = new Home();
        $home->title = $request->title;
        $home->description = $request->description;
        $home->status = $request->status;

        $home->save();
        //dd($home);
        session()->flash('success', 'Added successfully !!');
        return redirect()->route('admin_home_page_data_list');

    }


    public function delete($id)
    {
        $delete_query = Home::find($id);
        if (!is_null($delete_query)) {
            $delete_query->delete();
        }

        session()->flash('success', 'Data has deleted successfully !!');
        return back();

    }





}
