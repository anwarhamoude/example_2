<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller{

    public function index(){

        $users = User::paginate(25);
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user){

        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user){

        $user->update(request()->validate(['name' => 'required']));
        $user->update(request()->validate(['email' => 'required']));
        return redirect()->back();
    }
}
