<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.pages.multi_vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.multi_vendor.create');
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
            'vendor_name' => 'required',
            'vendor_phone' => 'required',
            'vendor_operator_name' => 'required',
            'vendor_operator_phone' => 'required',
            'vendor_tin' => 'required',
            'vendor_tread_number' => 'required',
            'vendor_office_address' => 'required',
        ]);
        // Vendor Image Upload
        if ($request->hasFile('vendor_image')) {
            $image = $request->file('vendor_image');
            $imageName = 'vendor' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(180, 180)->save('backend/uploads/vendor/' . $imageName);
        }else{
            $imageName = '';
        }

        $vendor = Vendor::create([
            'vendor_name' => $request->vendor_name,
            'vendor_phone' => $request->vendor_phone,
            'vendor_operator_name' => $request->vendor_operator_name,
            'vendor_operator_phone' => $request->vendor_operator_phone,
            'vendor_tin' => $request->vendor_tin,
            'vendor_tread_number' => $request->vendor_tread_number,
            'vendor_email' => $request->vendor_email,
            'vendor_description' => $request->vendor_description,
            'vendor_office_address' => $request->vendor_office_address,
            'vendor_image' => $imageName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($vendor) {
            Session::flash('success', "Vendor Create Successfully!");
            return redirect()->back();
        }else{
            Session::flash('error', "Vendor Create Failed!");
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
        $data = Vendor::where('id', $id)->firstOrFail();
        return view('backend.pages.multi_vendor.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Vendor::where('id', $id)->firstOrFail();
        return view('backend.pages.multi_vendor.edit', compact('data'));
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
            'vendor_name' => 'required',
            'vendor_phone' => 'required',
            'vendor_operator_name' => 'required',
            'vendor_operator_phone' => 'required',
            'vendor_tin' => 'required',
            'vendor_tread_number' => 'required',
            'vendor_office_address' => 'required',
        ]);

        $data = Vendor::where('id', $id)->firstOrFail();

        // Category Image Update
        if ($request->hasFile('vendor_image')) {
            // Old Image Delete
            if (File::exists('backend/uploads/vendor/'.$data->vendor_image)) {
                File::delete('backend/uploads/vendor/'.$data->vendor_image);
            }

            $image = $request->file('vendor_image');
            $imageName = 'vendor' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(180, 180)->save('backend/uploads/vendor/' . $imageName);
        }else{
            $imageName = $data->vendor_image;
        }

        $vendor = Vendor::where('vendor_status', 1)->where('id', $id)->update([
            'vendor_name' => $request->vendor_name,
            'vendor_phone' => $request->vendor_phone,
            'vendor_operator_name' => $request->vendor_operator_name,
            'vendor_operator_phone' => $request->vendor_operator_phone,
            'vendor_tin' => $request->vendor_tin,
            'vendor_tread_number' => $request->vendor_tread_number,
            'vendor_email' => $request->vendor_email,
            'vendor_description' => $request->vendor_description,
            'vendor_office_address' => $request->vendor_office_address,
            'vendor_image' => $imageName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($vendor) {
            Session::flash('success', "Vendor Update Successfully!");
            return redirect()->route('vendor.index');
        }else{
            Session::flash('error', "Vendor Update Failed!");
            return redirect()->route('vendor.index');
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
        $vendor = Vendor::where('id', $id)->firstOrFail();

        if (File::exists('backend/uploads/vendor/'.$vendor->vendor_image)) {
            File::delete('backend/uploads/category/'.$vendor->vendor_image);
        }
        $vendor->delete();

        if ($vendor) {
            Session::flash('success', "Vendor Delete Successfully!");
            return redirect()->route('vendor.index');
        }else{
            Session::flash('error', "Vendor Delete Failed!");
            return redirect()->route('vendor.index');
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
        Vendor::where('id', $id)->where('vendor_status', 0)->update([
            'vendor_status' => 1
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
        Vendor::where('id', $id)->where('vendor_status', 1)->update([
            'vendor_status' => 0
        ]);
        return redirect()->back();
    }
}
