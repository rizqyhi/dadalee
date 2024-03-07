<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashboardAction extends Controller
{
    public function __invoke()
    {
        $posts = Post::with(['author', 'likers:id'])
            ->withCount(['replies', 'likers'])
            ->latest('id')
            ->simplePaginate(3);

        return view('dashboard', compact('posts'));
    }
}
