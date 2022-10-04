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

            dd($user);
      
        $existingUser = User::where('email', $user->email)->first();
       if($existingUser){
     
            Auth::login($existingUser);
       return redirect()->to('/');
    
       }

       else{
        $passwordGoogle = Hash::make($user->name);
        $userId = User::insertGetId([
            'googleid' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'password' => $passwordGoogle,
            'created_at' => Carbon::now(),
            
           

        ]

        );

        $getUser = User::where('id', $userId)->first();
        Auth::login($getUser);
        return redirect()->to('/');



       }
    }
}
