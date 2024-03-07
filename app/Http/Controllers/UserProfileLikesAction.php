<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserProfileLikesAction extends Controller
{
    public function __invoke(User $user)
    {
        $posts = $user->likes()
            ->with('author')
            ->withCount(['replies', 'likers'])
            ->cursorPaginate(5);

        return view('single-profile', compact('user', 'posts'));
    }
}
