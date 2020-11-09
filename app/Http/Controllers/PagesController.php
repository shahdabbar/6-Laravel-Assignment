<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show()
    {
        return view('layouts.show', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function showPost($id)
    {
        return view('layouts.showPost', [
            'post' => Post::find($id)
        ]);
    }

    public function posts()
    {
        return view('layouts.about', [
            'posts' => Post::take(3)->latest()->get()
        ]);
    }

    public function index() {
        $title = 'Welcome To Laravel!';
        return View('layouts.index')->with('title', $title);

    }

    public function about() {
        $title = 'About Us';
        return View('layouts.about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
    );
        return View('layouts.services')->with($data);
    }
}
