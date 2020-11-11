<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadTrait;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {
        $data['all_user'] = User::all();
        //dd($data);
        return view('backend.pages.user.index',$data);
    }

    public function postStore(Request $request, User $user){
        $request->validate([
            'usertype' => 'required',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:150|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ],
        [
            'usertype.required'  => 'Please select',
            'name.required'  => 'Please name',
            'username.required'  => 'Please fillup username',
            'email' => 'Please enter email',
            'password' => 'Enter password',
            'image' => 'Please select an image',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = time();
            $folder = '/upload/user';
            $filePath = $folder . $imageName. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $imageName);
            $user->image = $filePath;
        }

        $user           = new User();
        $user->usertype = $request->usertype;
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $imageName.'.'.$image->getClientOriginalExtension();
        $user->save();

        toast('Data added successfully !!','success');
        return redirect()->route('user.list');
    }

    public function postDelete($id)
    {
        $delete_row = User::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }

        toast('Data has deleted successfully !!','success');
        return back();
    }

    public function getEdit($id)
    {
        $editData = User::find($id);
        //dd($editData);
        return view('backend.pages.user.edit')->with(compact('editData'));
    }

    public function postUpdate(Request $request, $id)
    {
        $user           = User::find($id);
        $user->usertype = $request->usertype;
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        toast('Data updated successfully !!','success');
        return redirect()->route('user.list');



    }

}
