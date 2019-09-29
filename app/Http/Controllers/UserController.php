<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{

    public function show($slug){

        $user = User::whereSlug($slug)->firstOrFail();
        return view('users.show', compact('user'));
    }

    public function edit(User $user){

        if(auth()->user()->isNot($user)) {
            return redirect('home');
        }else{

            return view('users.edit', compact('user'));
        }
    }

    public function update(User $user){

        if(auth()->user()->isNot($user)) {
            return redirect('home');
        }else {

            $user->update(request()->validate(['name' => 'required']));
            return redirect()->back();
        }
    }
}
