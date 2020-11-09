<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        return auth()->user()->User::following()->toggle($user->profile);
    }
}
