<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('backend.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('category_status', 1)->get();
        return view('backend.pages.subcategory.create', compact('categories'));
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
            'sub_category_name' => 'required',
        ]);

        // Sub Category Image Upload
        if ($request->hasFile('sub_category_image')) {
            $image = $request->file('sub_category_image');
            $imageName = 'sub_cat' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('backend/uploads/subcategory/' . $imageName);
        }else{
            $imageName = '';
        }

        $sub_category = SubCategory::create([
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => Str::slug($request->sub_category_name, '-'),
            'category_id' => $request->category_id,
            'sub_category_image' => $imageName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($sub_category) {
            Session::flash('success', "Sub Category Create Successfully!");
            return redirect()->back();
        }else{
            Session::flash('error', "Sub Category Create Failed!");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
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
        $categories = Category::where('category_status', 1)->get();
        $data = SubCategory::where('sub_category_slug', $slug)->firstOrFail();
        return view('backend.pages.subcategory.edit', compact('data', 'categories'));
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
            'sub_category_name' => 'required',
        ]);

        $data = SubCategory::where('sub_category_slug', $slug)->firstOrFail();

        // Sub Category Image Update
        if ($request->hasFile('sub_category_image')) {
            // Old Image Delete
            if (File::exists('backend/uploads/subcategory/'.$data->sub_category_image)) {
                File::delete('backend/uploads/subcategory/'.$data->sub_category_image);
            }

            $image = $request->file('sub_category_image');
            $imageName = 'sub_cat' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('backend/uploads/subcategory/' . $imageName);
        }else{
            $imageName = $data->sub_category_image;
        }

        $sub_category = SubCategory::where('sub_category_status', 1)->where('sub_category_slug', $slug)->update([
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => Str::slug($request->sub_category_name, '-'),
            'category_id' => $request->category_id,
            'sub_category_image' => $imageName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($sub_category) {
            Session::flash('success', "Sub Category Update Successfully!");
            return redirect()->route('sub-category.index');
        }else{
            Session::flash('error', "Sub Category Update Failed!");
            return redirect()->route('sub-category.index');
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
        $sub_category = SubCategory::where('sub_category_slug', $slug)->firstOrFail();

        if (File::exists('backend/uploads/subcategory/'.$sub_category->sub_category_image)) {
            File::delete('backend/uploads/subcategory/'.$sub_category->sub_category_image);
        }
        $sub_category->delete();

        if ($sub_category) {
            Session::flash('success', "Sub Category Delete Successfully!");
            return redirect()->route('sub-category.index');
        }else{
            Session::flash('error', "Sub Category Delete Failed!");
            return redirect()->route('sub-category.index');
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
        SubCategory::where('sub_category_slug', $slug)->where('sub_category_status', 0)->update([
            'sub_category_status' => 1
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
        SubCategory::where('sub_category_slug', $slug)->where('sub_category_status', 1)->update([
            'sub_category_status' => 0
        ]);
        return redirect()->back();
    }
}
