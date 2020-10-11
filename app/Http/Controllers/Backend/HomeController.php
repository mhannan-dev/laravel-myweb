<?php
namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
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
        ],
        [
            'name.required'  => 'Please fillup a title',
            'description.required'  => 'Please fillup a description',
            'status.required'  => 'Please select status',
        ]);

        $home = new Home();
        $home->title = $request->title;
        $home->description = $request->description;
        $home->status = $request->status;

        $home->save();
        //dd($home);
        //session()->flash('success', 'Added successfully !!');
        toast('Added successfully !!','success');
        return redirect()->route('admin.home.page');

    }


    public function delete($id)
    {
        $delete_query = Home::find($id);
        if (!is_null($delete_query)) {
            $delete_query->delete();
        }

        //session()->flash('success', 'Data has deleted successfully !!');
        toast('Data has deleted successfully !!','success');
        return back();

    }

    public function edit($id)
    {
        $data_list = Home::find($id);
        if (!is_null($data_list)) {

            return view('backend.pages.home.edit', compact('data_list'));
        }else {

            return redirect()->route('admin.home.page');
        }
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
            'status'     => 'required',
        ]);

        $data_list = Home::find($id);
        $data_list->title = $request->title;
        $data_list->description = $request->description;
        $data_list->status = $request->status;

        $data_list->save();
        //dd($data_list);

        toast('Data has updated successfully !!','success');
        return redirect()->route('admin.home.page',compact('data_list'));

    }





}
