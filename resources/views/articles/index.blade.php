@extends('layouts.app')

@section('content')

    @include('layouts._nav')

    <div class="container mt-40">
        <div class="justify-content-center">
        @foreach($articles as $article)
            <div class="mt-40">
                <div class="flex flex-center mb-16">
                    <a href="{{ route('articles.show', $article->slug) }}"><div class="font-1-2/3 grey">{{$article->title}}</div></a>
                    <a href="{{ route('user', $article->user->slug) }}"><div class="mt-8 ml-20 font-16">author: {{ $article->user->name }}</div></a>
                </div>
                <div class="flex mb-20">
                    <div class="mt-11 ml-20 mr-44"><a href="{{ route('user', $article->user->slug) }}"><img src="/storage/{{ $article->user->avatar() }}" style="width:64px;height:64px;" alt="No Image"></a></div>
                    <div class="mb-16 mr-20 font-1-1/3 grey nl2br">{{ Str::limit($article->content, 666) }}</div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="paginater">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
