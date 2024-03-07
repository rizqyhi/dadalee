<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeAction extends Controller
{
    public function __invoke(Post $post)
    {
        $post->likers()->toggle(auth()->user());

        if (request()->headers->has('hx-request')) {
            $post->load(['author'])->loadCount(['replies', 'likers']);
            return view('components.post', compact('post'));
        }

        return redirect()->back();
    }
}
