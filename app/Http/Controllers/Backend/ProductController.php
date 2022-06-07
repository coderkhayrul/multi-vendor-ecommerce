<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $vendors = Vendor::all();
        return view('backend.pages.product.create', compact('categories', 'vendors'));
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
            'vendor_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $uniq_product_code = uniqid();

        if ($request->hasFile('product_thumbnails')) {
            $product_image = $request->file('product_thumbnails');
            $imageName = time() . '_' . rand(100000, 10000000) . '.' . $product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(1100, 1100)->save('backend/uploads/product/' . $imageName);

            Product::create([
                'vendor_id' => $request->vendor_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'product_name' => $request->product_name,
                'product_slug' => Str::slug($request->product_name, '-'),
                'product_price' => $request->product_price,
                'product_code' => $uniq_product_code,
                'product_discount' => $request->product_discount,
                'product_discount_price' => $request->product_discount_price,
                'product_short_des' => $request->product_short_des,
                'product_long_des' => $request->product_long_des,
                'product_thumbnails' => $imageName,
                'product_quantity' => $request->product_quantity,
                'product_status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($request->hasFile('image')) {
            $gallery_image = $request->file('image');
            foreach($gallery_image as $image){
                $multi_imageName = 'PG' . '_' . rand(100000, 10000000) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1100, 1100)->save('backend/uploads/product/gallery/' . $multi_imageName);
                ProductGallery::create([
                    'product_code' => $uniq_product_code,
                    'image' => $multi_imageName,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);
            }
        }
        Session::flash('success', 'Product Create Successfully');
        return redirect()->back();
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
        $categories = Category::all();
        $sub_category = SubCategory::all();
        $vendors = Vendor::all();

        $product = Product::where('product_slug', $slug)->firstOrFail();
        $product_gallery = ProductGallery::where('product_code', $product->product_code)->get();
        return view('backend.pages.product.edit', compact('product_gallery', 'product', 'categories', 'vendors', 'sub_category'));
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
            'vendor_id' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $product = Product::where('product_slug', $slug)->firstOrFail();
        if ($request->hasFile('product_thumbnails')) {
            if (File::exists('backend/uploads/product/'.$product->product_thumbnails)) {
                File::delete('backend/uploads/product/'.$product->product_thumbnails);
            }

            $product_image = $request->file('product_thumbnails');
            $imageName = time() . '_' . rand(100000, 10000000) . '.' . $product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(1100, 1100)->save('backend/uploads/product/' . $imageName);
        }else{
            $imageName = $product->product_thumbnails;
        }

        Product::where('product_slug', $slug)->update([
            'vendor_id' => $request->vendor_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name, '-'),
            'product_price' => $request->product_price,
            'product_code' => $product->product_code,
            'product_discount' => $request->product_discount,
            'product_discount_price' => $request->product_discount_price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_thumbnails' => $imageName,
            'product_quantity' => $request->product_quantity,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($request->hasFile('image')) {
            $gallery_image = $request->file('image');
            foreach($gallery_image as $image){
                $multi_imageName = 'PG' . '_' . rand(100000, 10000000) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(1100, 1100)->save('backend/uploads/product/gallery/' . $multi_imageName);
                ProductGallery::create([
                    'product_code' => $product->product_code,
                    'image' => $multi_imageName,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);
            }
        }
        Session::flash('success', 'Product Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::where('product_slug', $slug)->firstOrFail();
        $proGallery = ProductGallery::where('product_code', $product->product_code)->get();
        foreach ($proGallery as $gallery){
            if (File::exists('backend/uploads/product/gallery/'.$gallery->image)) {
                File::delete('backend/uploads/product/gallery/'.$gallery->image);
            }
            $gallery->delete();
        }

        if (File::exists('backend/uploads/product/'.$product->product_thumbnails)) {
            File::delete('backend/uploads/product/'.$product->product_thumbnails);
        }
        $product->delete();
        if ($product) {
            Session::flash('success', "Product Delete Successfully!");
            return redirect()->route('product.index');
        }else{
            Session::flash('error', "Product Delete Failed!");
            return redirect()->route('product.index');
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
        Product::where('product_slug', $slug)->where('product_status', 0)->update([
            'product_status' => 1
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
        Product::where('product_slug', $slug)->where('product_status', 1)->update([
            'product_status' => 0
        ]);
        return redirect()->back();
    }


    public function get_sub_category(Request $request){
        $get_sub_category = SubCategory::where('category_id', $request->category_id)->where('sub_category_status', 1)->get();

        return response()->json([
            'status' => '200',
            'data' => $get_sub_category
        ]);
    }


    public function gallery_image(Request $request, $id)
    {
        $gallery = ProductGallery::find($id);
        if (File::exists('backend/uploads/product/gallery/'.$gallery->image)) {
            File::delete('backend/uploads/product/gallery/'.$gallery->image);
        }
        $gallery->delete();
        return redirect()->back();
    }
}
