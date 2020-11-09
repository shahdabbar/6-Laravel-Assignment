@extends('layouts.layout')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2><span class="text-dark">{{ $post->title }}</span></h2>
                </div>
                <p><img src="/css/images/banner.jpg" alt="" class="image image-full" /> </p>
                <p>{{ $post->body }}</p>
            </div>
        </div>
    </div>

@endsection
