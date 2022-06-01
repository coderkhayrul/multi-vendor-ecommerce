<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home(){
        $categories = Category::where('category_status', 1)->get();
        return view('frontend.home');
    }

    public function user_login(){

        if(Auth::user()->role == 3){
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return view('frontend.login');
        }
    }

    public function user_register(){
        if(Auth::user()->role == 3){
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return view('frontend.register');
        }
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
}
