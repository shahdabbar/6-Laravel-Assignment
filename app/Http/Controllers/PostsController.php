<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostsController extends Controller
{

    public function index()
    {
        // return view('layouts.showall', [
        //     'posts' => auth()->user()->timeline(),
        // ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'image' => ['required', 'image'],
        ]);

        $user_id =  auth()->user()->id;
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'excerpt' => $data['excerpt'],
            'image' => $imagePath,
            'user_id' => $user_id
        ]);

        return redirect('/profile/'. auth()->user()->id);

    }

    public function show(Post $post)
    {
        // dd($post);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'image' => ['required', 'image'],
        ]);

        $user_id = auth()->user()->id;
        $data['user_id'] = $user_id;
        $imagePath = request('image')->store('uploads', 'public');
        $data['image'] = $imagePath;

        $post->update($data);

        return redirect('/profile/'. auth()->user()->id);
    }

    public function showAll()
    {

        $users = auth()->user()->following->pluck('profiles->user->id');
        // // dd($users);
        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        // $comments = Comment::whereIn('post_id', $users)->latest()->paginate(2);
        // dd($comments);

        // $posts = Post::whereIn('user_id', $users)->withLikes()->latest()->paginate(20);
        $posts = Post::latest()->get();
        return view('layouts.showall', compact('posts'));
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect('/profile/'. auth()->user()->id);

    }

}
