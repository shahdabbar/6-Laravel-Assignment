@extends('layouts.app')

@section('header')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <div class="row">
            <div class="col-3">
               <img class="my-auto rounded-circle" src="{{ $user->profile->profileImage() }}">
            </div>

            <div id="app" class="col-9 pt-1 fl">
                <div class="d-flex justify-content-between align-items-baseline">
                    {{-- <div><h1>{{ Auth::user()->name }}</h1></div> --}}
                    <div class="d-flex align-items-center pb-3">
                        <div  class="h4">{{ $user->name }}</div>
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @if (Auth::user()->id == $user->profile->user_id )
                        <a href="/p/create"><span class="text-dark"><i class="pr-2 fa fa-plus-square"></i>New Post</span></a>
                    @endif

                </div>
                @if (Auth::user()->id == $user->profile->user_id )
                    <button class="btn btn-secondary"><a class="text-white" href="/profile/{{ $user->id }}/edit">Edit Profile</a></button>
                @endif

                @can('update', $user->profile)
                     <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong>posts</div>
                    <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong>followers</div>
                    <div class="pr-5"><strong>{{ $user->following->count() }}</strong>following</div>
                </div>

                <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>

    </div>

@endsection

@section('content')

    <div class="row pt-5 pl-5">
       @foreach ($user->posts as $post)

        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-80">
            </a>
            <h5 class="pt-1">
                <a href="/p/{{ $post->id }}">
                    <span class="text-dark">{{ $post->title }}</span>
                </a>
            </h5>
            <h6>{{ $post->excerpt }}</h6>
        </div>


       @endforeach

    </div>

@endsection
