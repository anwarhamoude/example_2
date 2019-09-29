@extends('layouts.app')

@section('content')

    @include('layouts._nav')

    <div class="container mt-40">
        <div class="justify-content-center">

            <div class="center mb-20 mt-20">
                <form method="post" action="{{ route($admin.'user.update', $user->slug) }}">
                    @csrf
                    @method('patch')
                    <div>
                        <input class="card-inner" type="text" name="name" value="{{ $user->name }}">
                         <button class="btn-linked ml-11" type="submit">edit user name</button>
                    </div>
                    <div class="mt-11 {{ $hide }}">
                        <input class="card-inner" type="text" name="email" value="{{ $user->email }}">
                        <button class="btn-linked ml-11" type="submit">edit user email</button>
                    </div>
                </form>
            </div>

            @empty($user->file_path)
                <div class="mt-40">
                    <h2 class="center grey">Add User Profile Image</h2>
                </div>

                <div class="mt-40 center">
                    <h3>Add profile image for <span class="green">{{ $user->name }}</span></h3>

                    <form method="post" action="{{ route($admin.'avatar', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-11">
                            <input type="file" name="file_path">
                        </div>
                        <div class="mt-11">
                            <button class="button" type="submit">upload image</button>
                        </div>
                    </form>
                </div>
            @endempty
            @isset($user->file_path)
                <div class="center mb-8 font-1-1/3 purple">{{ $user->name }}</div>
                <div class="center mb-16 font-1-1/3 green">{{ $user->email }}</div>
            @endisset
            <div class="mt-11 center">
                <img src="/storage/{{ $user->avatar() }}" style="width:256px;height:256px;" alt="No Image">
            </div>

            @isset($user->file_path)
                <form method="post" action="{{ route($admin.'avatar.delete', $user->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="center"><button type="submit" class="button-red mt-11">delete image</button></div>
                </form>
            @endisset

                <div class="center mb-100">
                    <div class="mt-40 font-1-1/3 grey">email verified: {{$user->email_verified_at}}</div>
                    <div class="mt-8 font-1-1/3 grey">account created: {{$user->created_at}}</div>
                    <div class="mt-8 font-1-1/3 grey">account updated: {{$user->updated_at}}</div>
                </div>

            </div>
        </div>
    </div>
@endsection
