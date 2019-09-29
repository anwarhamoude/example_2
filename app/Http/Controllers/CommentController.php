<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller{

    public function store(Request $request){

        $request->validate([
            'user_id' => 'string',
            'article_id' => 'string',
            'body' => 'required|min:3'
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->article_id = request('article_id');
        $comment->body = request('body');
        $comment->save();

        return redirect()->back();
    }


    public function update(Request $request, $id){

        $request->validate([
            'user_id' => 'string',
            'article_id' => 'string',
            'body' => 'required|min:3'
        ]);

        $comment = Comment::find($id);
        if(Auth::id() == $comment->user_id){
            $comment->user_id = Auth::id();
            $comment->article_id = request('article_id');
            $comment->body = request('body');
            $comment->save();
        }else{
            \Auth::logout();
        }

        return back();
    }


    public function destroy($id){

        $comment = Comment::find($id);
        if(Auth::id() == $comment->user_id){
            $comment->delete();
        }else{
            \Auth::logout();
        }

        return back();
    }
}
