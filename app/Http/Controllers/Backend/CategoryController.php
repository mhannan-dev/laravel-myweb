<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Traits\CategoryTrait;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use CategoryTrait;
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
        $data['title'] = "Category";
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index', $data);
    }

    public function store(Request $request)
    {
        $this->validaion_check($request);
        $data = new Category();
        $this->data_process($data, $request);
        toast('Successfully Date Saved','success');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $this->validaion_check($request);
        $data = Category::findOrFail($request->category_id);
        $this->data_process($data, $request);
        toast('Successfully Date Saved','success');
        return redirect()->back();

    }

    public function destroy(Category $category){
        try {
            $category->delete();
        } catch (Exception $e) {
            toast($e->message(),'error');
            return redirect()->back();
        }
        toast('Successfully Date Deleted','success');
        return redirect()->back();
    }








}
