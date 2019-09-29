<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;

class UserImageController extends Controller{

    public function store(){

        request()->validate([
            'file_path' => ['required','image']
        ]);

        auth()->user()->update([
            'file_path' => request()->file('file_path')->store('avatars','public')
        ]);

        return back();
    }



    public function user(){

        return $this->belongsTo('App\User');
    }



    public function destroy($id){

        $user = User::findOrFail($id);
        if((empty($user->file_path)) || (auth()->user()->isNot($user))){
            \Auth::logout();
        }else{
            unlink(storage_path('app/public/'.$user->file_path));
            $user->update(['file_path' => null]);
        }

        return back();
    }
}
