@extends('layouts.app')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            @foreach ($posts as $post)
                <div class="row pt-4">
                    <div class="col-5">
                        <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100" alt=""></a>
                    </div>
                    <div class="col-5 pt-3 pb-3">
                        <div>
                            <p>
                                <span class="font-weight-bold">
                                    <a href="/profile/{{ $post->user->id }}">
                                        <span class="text-dark">{{ $post->user->username}}</span>
                                    </a>
                                </span> {{ $post->title }}
                            </p>
                            <hr>
                            {{-- $post->likes --}}
                            <div class="pt-0 pb-2 d-flex">
                                <div class="text-gray-500 pr-3">
                                    <strong>0</strong>
                                    <a href="#">
                                        <span id="like" class="text-gray-500"><i class="fa fa-thumbs-up"></i></span>
                                    </a>
                                </div>
                                <div class="text-gray-500 pr-3"><strong>{{ $post->comments->count() }}</strong>
                                    <a href="#">
                                        <span class="text-gray-500"><i class="fa fa-comment-dots"></i></span>
                                    </a>
                                </div>
                            </div>
                            <h6>{{ $post->excerpt }}</h6>

                        </div>
                        <a href="#" style="color: gray; font-size:14px; margin:0px">View all {{ $post->comments->count() }} comments</a>

                            @foreach ($post->comments as $comment)
                                <div class="d-flex align-items-center">
                                    <div class="pr-2">
                                        <img src="{{ $comment->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;" alt="">
                                    </div>
                                    <div class="pr-2">
                                        <p>
                                            <span class="font-weight-bold">
                                                <a href="/profile/{{ $post->user->id }}">
                                                    <span class="text-dark">{{ $comment->user->username}}</span>
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                    <p>{{ $comment->comment }}</p>
                                 </div>
                            @endforeach

                        <div class="d-flex align-items-center py-2" id="parent">
                            <div class="pr-3">
                                <img src="{{ auth()->user()->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;" alt="">
                            </div>
                            <div>
                                <div class="font-weight-bold">
                                    <span style="font-size: 14px; color:gray" ><input id="cmtinput" type="text" placeholder="Add a comment..."></span>
                                    <a href="#" onclick="myComment({{  $post->id }})" id="comment">
                                        <span class="text-dark"><i class="fa fa-arrow-circle-down"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <p style="font-size: 12px; color: gray;">{{ $post->created_at }}</p>


                    </div>

                </div>

                <hr>

            @endforeach
            <div class="row">
                {{-- <div class="col-12 d-flex justify-content-center">
                     {{ $posts->links() }}
                </div> --}}
            </div>
        </div>
    </div>

@endsection

<script src="js/posts.js"></script>

