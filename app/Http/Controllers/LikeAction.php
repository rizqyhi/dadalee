<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeAction extends Controller
{
    public function __invoke(Post $post)
    {
        $post->likers()->toggle(auth()->user());

        return redirect()->back();
    }
}
