<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GoogleLoginController extends Controller
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
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect(RouteServiceProvider::HOME);
       
            }else{
                $newUser = User::updateOrCreate([
                    'email' => $user->email,
                ],
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->id),
                    'google_id'=> $user->id,
                ]);
      
                Auth::login($newUser);
      
                return redirect(RouteServiceProvider::HOME);
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
