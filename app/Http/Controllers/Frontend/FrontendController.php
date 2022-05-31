<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $categories = Category::where('category_status', 1)->get();
        return view('frontend.home');
    }

    public function user_login(){
        return view('frontend.login');
    }

    public function user_register(){
        return view('frontend.register');
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
}
