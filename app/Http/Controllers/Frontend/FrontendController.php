<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\SubCategory;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function test(){
        $addcartList = Cart::getContent();
        return $addcartList;
    }

    public function user_login(){
        if (Auth::check()) {
            return redirect()->route('frontend.home');
        }else{
            return view('frontend.login');
        }
    }

    public function user_register(){
        if (Auth::check()) {
            return redirect()->route('frontend.home');
        }else{
            return view('frontend.register');
        }
    }


    public function home(){
        $categories = Category::where('category_status', 1)->get();
        return view('frontend.home');
    }

    public function purchase_guide(){
        return view('frontend.purchase_guide');
    }
    public function about_us(){
        return view('frontend.about_us');
    }
    public function contact(){
        return view('frontend.contact');
    }

    public function vendor(){
        $vendors = Vendor::orderBy('id', 'asc')->get();
        return view('frontend.vendor', compact('vendors'));
    }

    // User Profile
    public function userprofile(){
        return view('frontend.user_profile');
    }

    // Coupon Apply
    public function coupon_apply(Request $request){
        $this->validate($request,[
            'coupon_code' => 'required'
        ]);

        $current_date = date('d-M-Y', strtotime(Carbon::now()));
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        $exp_date = date('d-M-Y', strtotime($coupon->coupon_exp_date));
        $cart_subTotal = Cart::getSubTotal();
        // return $cart_subTotal;
        $update_amount = $cart_subTotal - $coupon->coupon_amount;

        return $update_amount;

        // Cart::update(456, array(
        //     'name' => 'New Item Name', // new item name
        //     'price' => 98.67, // new item price, price can also be a string format like so: '98.67'
        // ));


        if ($current_date < $exp_date) {
            return "Coupon Apply Successfully";
        }else {
            return "Coupon Date Expire";
        }
    }
}
