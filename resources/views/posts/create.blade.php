@extends('layouts.app')

@section('content')

    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <h1>Create Post</h1>
                </div>
            </div>
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="title" value="{{ __('Post Title') }}" />
                    <x-jet-input id="title" class="block mt-1" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                </div>
            </div>
            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="excerpt" value="{{ __('Post Excerpt') }}" />
                    {{-- <textarea name="body" id="body" cols="30" rows="10"></textarea> --}}
                    <x-jet-input id="excerpt" class="block mt-1" type="text" name="excerpt" :value="old('excerpt')" required autofocus autocomplete="excerpt" />
                </div>
            </div>

            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="body" value="{{ __('Post Body') }}" />
                    <textarea name="body" id="body" cols="30" rows="10"></textarea>
                    {{-- <x-jet-input id="body" class="block mt-1" type="textarea" name="body" :value="old('body')" required autofocus autocomplete="body" /> --}}
                </div>
            </div>
        </div>

        <div class="row mt-1 col-8 offset-2">
            <div>
                <x-jet-label for="image" value="{{ __('Post Image') }}" />
                <x-jet-input id="image" class="block mt-1" type="file" name="image" required autofocus autocomplete="image" />
                {{-- <input type="file" class="form-control-file" id="image" name="image"> --}}
            </div>
        </div>

        <div class="mt-1 col-8 offset-2 row pt-4">
            <button class="btn btn-primary">Add New Post</button>
        </div>

    </form>

@endsection
