<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slider.create');
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
            'slider_title' => 'required',
            'slider_image' => 'required',
        ]);
        // Slider Image Upload
        if ($request->hasFile('slider_image')) {
            $image = $request->file('slider_image');
            $imageName = 'slider' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(2376, 807)->save('backend/uploads/slider/' . $imageName);
        }else{
            $imageName = '';
        }

        $slider = Slider::create([
            'slider_title' => $request->slider_title,
            'slider_link' => $request->slider_link,
            'slider_description' => $request->slider_description,
            'slider_image' => $imageName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($slider) {
            Session::flash('success', "Slider Create Successfully!");
            return redirect()->back();
        }else{
            Session::flash('error', "Slider Create Failed!");
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
    public function edit($id)
    {
        $data = Slider::where('id', $id)->firstOrFail();
        return view('backend.pages.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'slider_title' => 'required',
        ]);

        $data = Slider::where('id', $id)->firstOrFail();

        // Slider Image Update
        if ($request->hasFile('slider_image')) {
            // Old Image Delete
            if (File::exists('backend/uploads/slider/'.$data->slider_image)) {
                File::delete('backend/uploads/slider/'.$data->slider_image);
            }
            $image = $request->file('slider_image');
            $imageName = 'slider' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(2376, 807)->save('backend/uploads/slider/' . $imageName);
        }else{
            $imageName = $data->slider_image;
        }

        $slider = Slider::where('id', $id)->update([
            'slider_title' => $request->slider_title,
            'slider_link' => $request->slider_link,
            'slider_description' => $request->slider_description,
            'slider_image' => $imageName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($slider) {
            Session::flash('success', "Slider Update Successfully!");
            return redirect()->route('slider.index');
        }else{
            Session::flash('error', "Slider Update Failed!");
            return redirect()->route('slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();

        if (File::exists('backend/uploads/slider/'.$slider->slider_image)) {
            File::delete('backend/uploads/slider/'.$slider->slider_image);
        }
        $slider->delete();

        if ($slider) {
            Session::flash('success', "Slider Delete Successfully!");
            return redirect()->route('slider.index');
        }else{
            Session::flash('error', "Slider Delete Failed!");
            return redirect()->route('slider.index');
        }
    }



        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active_status($id)
    {
        Slider::where('id', $id)->where('slider_status', 0)->update([
            'slider_status' => 1
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactive_status($id)
    {
        Slider::where('id', $id)->where('slider_status', 1)->update([
            'slider_status' => 0
        ]);
        return redirect()->back();
    }
}
