<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function gotogoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleinfostore(){
        try{
            $googleUser = Socialite::driver('google')->user();
            $findUser = User::where('socialId', $googleUser->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                $tableField= new User();
                $tableField->full_name = 'Google Account';
                $tableField->name = $googleUser->name;
                $tableField->email = $googleUser->email;
                $tableField->role = '3';
                $tableField->socialId = $googleUser->id;
                $tableField->password = encrypt($googleUser->id);
                $tableField->save();
                Auth::login($findUser);
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
