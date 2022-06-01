<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

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
                    'social_type'=> 'google',
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
