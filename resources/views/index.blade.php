@extends('layouts.app')

@section('styles')
    <style>
        .title {
            font-size:84px;
            color:rgba(0,0,0,0.66);
            position:absolute;
            top:33%;
        }
        .top-right {
            position:absolute;
            right:33px;
            top:11px;
        }
    </style>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">

            <div class="top-right">

                    <div class="flex">
                        <a href="{{ route('login') }}"><h2 class="grey normal">{{ __('Login') }}</h2></a>
                        <a href="{{ route('register') }}"><h2 class="grey normal ml-11">{{ __('Register') }}</h2></a>
                    </div>

            </div>

        <div class="title">{{ __('Example Website')}}</div>

    </div>
@endsection
