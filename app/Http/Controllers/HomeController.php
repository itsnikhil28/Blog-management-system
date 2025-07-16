<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showpost()
    {
        $posts = Post::latest()->limit(5)->get();
        return view('welcome', compact('posts'));
    }

    public function apifetchdata()
    {
        $posts = Post::latest()->get();

        return response()->json($posts);
    }
}
