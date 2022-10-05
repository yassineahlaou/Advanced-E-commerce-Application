<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Socialite;
use App\Models\User;


use Illuminate\Routing\Controller;


use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TwitterAuthController extends Controller
{
    public function RedirectToProvider(){
        
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
       
            $user = Socialite::driver('twitter')->user();

           // dd($user);
      
        $existingUser = User::where('email', $user->email)->first();
       if($existingUser){
     
            Auth::login($existingUser);
       return redirect()->to('/');
    
       }

       else{
        $passwordSocialAuth = Hash::make($user->name);
        if ($user->email == null){
            $email = "No twitter email. Nickname : " . $user->nickname;
        }
        else{
            $email = $user->email;
        }
        $userId = User::insertGetId([
            'twitterid' => $user->id,
            'name' => $user->name,
            'email' => $email,
            'avatar' => $user->avatar,
            'password' => $passwordSocialAuth,
            
            'created_at' => Carbon::now(),
            
           

        ]

        );

        $getUser = User::where('id', $userId)->first();
        Auth::login($getUser);
        return redirect()->to('/');



       }
    }
}
