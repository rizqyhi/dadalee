<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeAction extends Controller
{
    public function __invoke()
    {
        if (auth()->guest()) {
            return view('home');
        }

        $posts = Post::with(['author', 'likers:id'])
            ->withCount(['replies', 'likers'])
            ->latest('id')
            ->simplePaginate(3);

        return view('dashboard', compact('posts'));
    }
}
