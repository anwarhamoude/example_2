@extends('layouts.app')

@section('content')

@include('layouts._nav')

<div class="container mt-40">
    <div class="justify-content-center">

        <div class="mt-11 center">

            <div class="mb-8 font-1-1/3 purple">{{$user->name}}</div>
            <div class="mb-16 font-1-1/3 green">{{$user->email}}</div>

            <img src="/storage/{{ $user->avatar() }}" style="width:256px;height:256px;" alt="No Image">

            @if(auth()->user()->id == $user->id)
            <div class="mt-20">
            <a class="button-edit" href="{{ route('user.edit', $user->slug) }}">edit user</a>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
