<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeAction extends Controller
{
    public function __invoke()
    {
        return view('home');
    }
}
