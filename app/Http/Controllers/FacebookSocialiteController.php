<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacebookSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/');

            }else{
                $newUser = User::create([
                    'full_name' => $user->name,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => 3,
                    'social_id'=> $user->id,
                    'social_type'=> 'facebook',
                    'password' => encrypt('password')
                ]);

                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
