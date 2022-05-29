<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required',
        ]);
        // Category Image Upload
        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = 'category' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('backend/uploads/category/' . $imageName);
        }else{
            $imageName = '';
        }

        $category = Category::where('category_status', 1)->create([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
            'category_description' => $request->category_description,
            'category_image' => $imageName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($category) {
            Session::flash('success', "Category Create Successfully!");
            return redirect()->back();
        }else{
            Session::flash('error', "Category Create Failed!");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = Category::where('category_slug', $slug)->firstOrFail();
        return view('backend.pages.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'category_name' => 'required',
        ]);

        $data = Category::where('category_slug', $slug)->firstOrFail();

        // Category Image Update
        if ($request->hasFile('category_image')) {
            // Old Image Delete
            if (File::exists('backend/uploads/category/'.$data->category_image)) {
                File::delete('backend/uploads/category/'.$data->category_image);
            }

            $image = $request->file('category_image');
            $imageName = 'category' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('backend/uploads/category/' . $imageName);
        }else{
            $imageName = $data->category_image;
        }

        $category = Category::where('category_status', 1)->where('category_slug', $slug)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
            'category_description' => $request->category_description,
            'category_image' => $imageName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($category) {
            Session::flash('success', "Category Update Successfully!");
            return redirect()->route('category.index');
        }else{
            Session::flash('error', "Category Update Failed!");
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('category_slug', $slug)->firstOrFail();

        if (File::exists('backend/uploads/category/'.$category->category_image)) {
            File::delete('backend/uploads/category/'.$category->category_image);
        }
        $category->delete();

        if ($category) {
            Session::flash('success', "Category Delete Successfully!");
            return redirect()->route('category.index');
        }else{
            Session::flash('error', "Category Delete Failed!");
            return redirect()->route('category.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active_status($slug)
    {
        Category::where('category_slug', $slug)->where('category_status', 0)->update([
            'category_status' => 1
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactive_status($slug)
    {
        Category::where('category_slug', $slug)->where('category_status', 1)->update([
            'category_status' => 0
        ]);
        return redirect()->back();
    }
}
