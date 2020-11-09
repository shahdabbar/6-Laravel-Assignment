@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-5">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-5">

            <div>
                <div class="m-0 pb-0 d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="pr-3">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;" alt="">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username}}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="/blog"><span class="text-dark"><i class="far fa-times-circle"></i></span></a>

                </div>
                <hr>
                <div class="pt-0 d-flex">
                    <div class="pr-3">
                        <strong>50</strong>
                        <a href="#">
                            <span class="text-dark"><i class="fa fa-thumbs-up"></i></span>
                        </a>
                    </div>
                    <div class="pr-3"><strong>200</strong>
                        <a href="#">
                            <span class="text-dark"><i class="fa fa-comment-dots"></i></span>
                        </a>
                    </div>
                </div>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username}}</span>
                        </a>
                    </span> {{ $post->title }}
                </p>

                <h6>{{ $post->excerpt }}</h6>
                <p>{{ $post->body }}</p>
                <a href="#" style="color: gray; font-size:14px; margin:0px">View all 200 comments</a>
                <p style="font-size: 12px; color: gray;">{{ $post->created_at }}</p>

                <a class="pr-3" href="/p/{{ $post->id }}/edit"><span class="text-dark"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                {{-- <a href="/p/{{ $post->id }}/edit"><button class="btn btn-primary">Edit Post</button></a> --}}
                <a class="pr-3" href="/p/{{ $post->id }}/delete"><span class="text-dark"><i class="fa fa-trash-alt"></i></span></a>
                {{-- <a href="/p/{{ $post->id }}/delete"></a><button class="btn btn-primary">Delete Post</button> --}}

                <hr>
            </div>

        </div>

    </div>

</div>

@endsection
