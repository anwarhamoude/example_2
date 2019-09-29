@extends('layouts.app')

@section('content')

    @include('layouts._nav')

    <div class="container mt-40">
        <div class="justify-content-center">

            <h2 class="grey center">{{ __('Edit Article') }}</h2>

            <div>
                @include('articles._form',['action' => route('articles.update',[$article->slug]) ])
            </div>

        </div>
    </div>
@endsection
