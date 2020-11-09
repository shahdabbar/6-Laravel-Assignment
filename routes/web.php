<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Mail\NewUserWelcomeMail;
use Resources\Views\Layouts;
use App\Models;
// header('Content-Type: application/json');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::get('/about', [PagesController::class, 'posts']);
// Route::get('/posts/{post}', [PagesController::class, 'showPost']);
// Route::get('/posts', [PagesController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('profiles.index');
    return view('layouts.layout');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->post('/comment/{post}', [CommentsController::class, 'store']);


Route::middleware(['auth:sanctum', 'verified'])->post('/follow/{user}', [FollowsController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/blog', [PostsController::class, 'showAll']);


Route::middleware(['auth:sanctum', 'verified'])->get('/profile/{user}', [ProfilesController::class, 'index'])->name('profileShow');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');

Route::middleware(['auth:sanctum', 'verified'])->post('/profile/{user}/update', [ProfilesController::class, 'update'])->name('profile.update');

//

Route::middleware(['auth:sanctum', 'verified'])->get('/p/create', [PostsController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->post('/p', [PostsController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/p/{post}', [PostsController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/p/{post}/edit', [PostsController::class, 'edit']);

Route::middleware(['auth:sanctum', 'verified'])->post('/p/{post}/update', [PostsController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/p/{post}/delete', [PostsController::class, 'delete']);
