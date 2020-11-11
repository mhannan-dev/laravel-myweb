<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

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
        return view('backend/pages/service/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'         => 'required',
            'title'         => 'required|max:150',
            'description'     => 'required',
            'status'     => 'required',
        ]);

        $service                = new Service();
        $service->icon          = $request->icon;
        $service->title         = $request->title;
        $service->description   = $request->description;
        $service->status        = $request->status;

        $service->save();
        //dd($about);

        toast('Data Added successfully !!','success');
        return redirect()->route('admin.service.page');

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
