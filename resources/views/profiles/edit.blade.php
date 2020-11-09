@extends('layouts.app')

@section('content')

    <form action="/profile/{{ $user->id }}/update" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <h1>Edit Profile</h1>
                </div>
            </div>
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="title" value="{{ __('Post Title') }}" />
                    <x-jet-input id="title" class="block mt-1" type="text" name="title" :value="old('title') ?? $user->profile->title" required autofocus autocomplete="title" />
                </div>
            </div>
            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-input id="description" class="block mt-1" type="text" name="description" :value="old('description') ?? $user->profile->description" required autofocus autocomplete="description" />
                </div>
            </div>
            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="url" value="{{ __('URL') }}" />
                    <x-jet-input id="url" class="block mt-1" type="text" name="url" :value="old('url') ?? $user->profile->url " required autofocus autocomplete="url" />
                </div>
            </div>

        </div>

        <div class="row mt-1 col-8 offset-2">
            <div>
                <x-jet-label for="image" value="{{ __('Profile Image') }}" />
                <x-jet-input id="image" class="block mt-1" type="file" name="image" />
            </div>
        </div>

        <div class="mt-1 col-8 offset-2 row pt-4">
            <div class="pr-3">
                 <button class="btn btn-primary" >Save Profile</button>
            </div>
            <div class="pr-3">
                <button class="btn btn-primary"><a class="text-white" href="/profile/{{ $user->profile->id }}">Cancel</a></button>

            </div>
        </div>


    </form>


@endsection



{{-- @extends('layouts.app')

@section('content')

    <form action="/profile/update/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <h1>Edit Profile</h1>
                </div>
            </div>
            <div class=" mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                </div>
            </div>
            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-input id="description" class="block mt-1" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                </div>
            </div>

            <div class="mt-1 col-8 offset-2">
                <div>
                    <x-jet-label for="url" value="{{ __('URL') }}" />
                    <x-jet-input id="url" class="block mt-1" type="text" name="url" :value="old('url')" required autofocus autocomplete="url" />
                </div>
            </div>
        </div>

        <div class="row mt-1 col-8 offset-2">
            <div>
                <x-jet-label for="image" value="{{ __('Profile Image') }}" />
                <x-jet-input id="image" class="block mt-1" type="file" name="image" required autofocus autocomplete="image" />
            </div>
        </div>

        <div class="mt-1 col-8 offset-2 row pt-4">
            <button class="btn btn-primary">Save Profile</button>
        </div>

    </form>

@endsection --}}
