@extends('layouts.app')

@section('content')

    @include('layouts._nav')

    <div class="container mt-40">
        <div class="justify-content-center">

            <div class="mt-11 mb-80">
                <div class="mb-16 flex flex-center">
                    <div class="font-1-2/3 grey">{{$article->title}}</div>
                    <a href="{{ route('user', $article->user->slug) }}"><div class="mt-8 ml-20 font-16">author: {{ $article->user->name }}</div></a>
                </div>
                <div class="mb-16 mr-20 ml-20 font-1-1/3 grey nl2br">{{$article->content}}</div>
            </div>

            @include('articles._comment')

            <div class="mb-100"><br/></div>

    </div>
@endsection

