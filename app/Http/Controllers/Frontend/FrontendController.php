<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend.home');
    }

    public function user_login(){
        return view('frontend.login');
    }

    public function user_register(){
        return view('frontend.register');
    }
}
