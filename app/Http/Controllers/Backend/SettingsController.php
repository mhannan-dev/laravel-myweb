<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Setting;
use Illuminate\Http\Request;

use App\Http\Traits\UploadTrait;

class SettingsController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {

        $data = Setting::all();
        $countLogo = Setting::count();
        //dd($countLogo);
        return view('backend/pages/web/index',compact('data','countLogo'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories = Category::where('type', 2)->get();
        return view('backend.pages.portfolio.create', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Setting $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function postStore(Request $request, Setting $post)
    {
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'footer_text' => 'required|max:200'
        ]);
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $imageName = time();
            $folder = '/upload/logo/';
            $filePath = $folder . $imageName . '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $imageName);
            $post->logo = $filePath;
        }

        $post = new Setting();
        $post->logo = $imageName . '.' . $image->getClientOriginalExtension();
        $post->footer_text = $request->footer_text;
        $post->save();
        toast('Information added successfully', 'success');
        return redirect()->route('admin.view.settings');

        //return  $request->all();

    }




    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'status' => 'required',
        ]);

        $data_list = Service::find($id);
        $data_list->icon = $request->icon;
        $data_list->title = $request->title;
        $data_list->description = $request->description;
        $data_list->status = $request->status;

        $data_list->save();
        //dd($data_list);

        toast('Data hasbeen updated successfully !!', 'success');
        return redirect()->route('admin.service.page', compact('data_list'));

    }

    public function postDelete($id)
    {
        $delete_row = Setting::find($id);
        //dd($delete_row);
        if (!is_null($delete_row)) {
            $delete_row->delete();
        }
        toast('Data has deleted successfully !!', 'success');
        return back();

    }


}
