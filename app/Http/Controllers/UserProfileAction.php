<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileAction extends Controller
{
    public function __invoke(User $user)
    {
        $posts = $user->posts()
            ->with('author')
            ->withCount(['replies', 'likers'])
            ->cursorPaginate(5);

        return view('single-profile', compact('user', 'posts'));
    }
}
