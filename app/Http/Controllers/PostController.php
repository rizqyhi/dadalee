<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['content' => 'required|max:240', 'parent_id' => 'nullable|integer|min:1']);

        $post = new Post([
            'content' => $request->post('content'),
            'author_id' => auth()->id(),
            'parent_id' => $request->post('parent_id')
        ]);

        $post->save();

        if ($request->has('parent_id')) {
            return redirect()
                ->route('posts.show', $request->post('parent_id'))
                ->with('success_message', 'Posted!');
        }

        return redirect()
            ->route('dashboard')
            ->with('success_message', 'Posted!');
    }

    public function show(Post $post)
    {
        $post->loadCount(['replies', 'likers']);

        $replies = $post->replies()
            ->with(['author'])
            ->withCount(['replies', 'likers'])
            ->get();

        return view('single-post', compact('post', 'replies'));
    }
}
