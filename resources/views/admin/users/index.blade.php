@extends('layouts.app')

@section('content')

@include('layouts._nav')

<div class="left">
    @foreach($users as $user)
        <a href="{{ route('admin.user.edit', [$user->slug]) }}">
        <div class="flex mb-11">
            <div class="mr-20 mt-11 font-1-1/3 grey">{{$user->id}}</div>
            <img src="/storage/{{ $user->avatar() }}" style="width:64px;height:64px;" alt="No Image">
            <div>
                <div class="ml-11 font-1-1/3 purple">{{$user->name}}</div>
                <div class="ml-11 font-1-1/3 green">{{$user->email}}</div>
            </div>
        </div>
        </a>
    @endforeach
</div>
@endsection
