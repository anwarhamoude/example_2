<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Administrators{


    public function handle($request, Closure $next){

        $user = Auth::user();

        if($user && $user->email == 'galacticcurry@aol.com'){
            \session('auth', true);
            return $next($request);
        }

        return redirect('/home');
    }
}

