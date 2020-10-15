<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Contact::orderBy('id', 'desc')->get();
        $data = DB::select('SELECT * FROM contacts WHERE status = 0 ORDER BY fullname DESC');
        //dd($data);
        return view('backend/pages/message/index')->with('data', $data);

    }

    public function seenIndex()
    {
        //$data = Contact::orderBy('id', 'desc')->get();
        $data = DB::select('SELECT * FROM contacts WHERE status = 1 ORDER BY fullname DESC');
        //dd($data);
        return view('backend/pages/message/seen_msg')->with('data', $data);
    }

    public function edit($id)
    {
        $view_msg= Contact::find($id);
        if (!is_null($view_msg)) {
            //dd($view_msg);
            return view('backend/pages/message/view_msg', compact('view_msg'));
        }else {
            return resirect()->route('admin.message.page');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname'  => 'required',
            'message'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'status'  => 'required',
        ]);

        $update_msg = Contact::find($id);
        $update_msg->fullname = $request->fullname;
        $update_msg->email = $request->email;
        $update_msg->subject = $request->subject;
        $update_msg->status = $request->status;

        $update_msg->save();

        toast('Message viewed successfully !!','success');
        return redirect()->route('admin.message.page');

    }








}
