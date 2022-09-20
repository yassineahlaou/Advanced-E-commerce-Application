<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        if (Auth::check()){
            $expiretime = Carbon::now()->addSeconds(60);
            Cache::put('user_is_online'. Auth::user()->id , true , $expiretime);
           // Cache::forever('user_is_online'. Auth::user()->id , true);
            
            User::where('id',Auth::user()->id)->update(['last_seen'=> Carbon::now()]);

        }
       if( Auth::check() && Auth::user()){

            return $next($request);
       }
       else{
        return redirect()->route('login');
       }
    }
}