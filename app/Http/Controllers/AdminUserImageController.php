<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserImageController extends Controller{

    public function store($id){

        request()->validate([
            'file_path' => ['required','image']
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'file_path' => request()->file('file_path')->store('avatars','public')
        ]);

        return back();
    }



    public function user(){

        return $this->belongsTo('App\User');
    }



    public function destroy($id){

        $user = User::findOrFail($id);
        if(empty($user->file_path)){
            \Auth::logout();
        }else{
            unlink(storage_path('app/public/'.$user->file_path));
            $user->update(['file_path' => null]);
        }

        return back();
    }
}
