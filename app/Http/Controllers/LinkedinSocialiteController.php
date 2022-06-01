<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkedinSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('linkedin')->user();

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
                    'social_type'=> 'linkedin',
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
