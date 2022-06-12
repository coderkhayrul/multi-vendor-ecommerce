<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::where('coupon_status', 1)->get();
        return view('backend.pages.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.coupon.create');
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
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_quantity' => 'required',
            'coupon_exp_date' => 'required',
        ]);

        $coupon = Coupon::create([
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_quantity' => $request->coupon_quantity,
            'coupon_exp_date' => Carbon::parse($request->coupon_exp_date),
            'coupon_creator' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($coupon) {
            Session::flash('success', "Coupon Create Successfully!");
            return redirect()->back();
        }else{
            Session::flash('error', "Coupon Create Failed!");
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
        $data = Coupon::find($id);
        return view('backend.pages.coupon.edit', compact('data'));
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
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_quantity' => 'required',
            'coupon_exp_date' => 'required',
        ]);

        $coupon = Coupon::where('id', $id)->update([
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_quantity' => $request->coupon_quantity,
            'coupon_exp_date' => Carbon::parse($request->coupon_exp_date),
            'coupon_editor' => $request->coupon_editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($coupon) {
            Session::flash('success', "Coupon Update Successfully!");
            return redirect()->route('coupon.index');
        }else{
            Session::flash('error', "Coupon Update Failed!");
            return redirect()->route('coupon.index');
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
        $coupon = Coupon::where('id', $id)->delete();
        if ($coupon) {
            Session::flash('success', "Coupon Delete Successfully!");
            return redirect()->route('coupon.index');
        }else{
            Session::flash('error', "Coupon Delete Failed!");
            return redirect()->route('coupon.index');
        }
    }
}
