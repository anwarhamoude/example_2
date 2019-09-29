<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller{

    public function index(){

        $articles = Article::latest()->paginate(25);
        return view('articles.index')->withArticles($articles);
    }

    public function create(){

        return view('articles.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3|max:86',
            'content' => 'required',
            'file_path' => 'nullable',
        ]);

        $user = Auth::user();
        $article = $user->articles()->create([
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return redirect()->route('articles.show', $article->slug);
    }

    public function show($slug){

        $article = Article::whereSlug($slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function edit($slug){

        $article = Article::whereSlug($slug)->firstOrFail();
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $slug){

        $request->validate([
            'title' => 'required|min:3|max:46',
            'content' => 'required',
            'file_path' => 'nullable',
        ]);

        $article = Article::whereSlug($slug)->firstOrFail();
            $article->title = request('title');
            $article->content = request('content');
        $article->save();

        return redirect()->route('articles.show', $article->slug);
    }

    public function destroy($slug){

        $article = Article::whereSlug($slug)->firstOrFail();
        $article->delete();

        return redirect()->route('articles.index');
    }
}
