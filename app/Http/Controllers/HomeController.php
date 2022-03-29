<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($name = null)
    {
        $posts = Post::paginate(5);
        // $posts = Post::latest()->get();
        // $posts = Post::orderBy("title", "ASC")->get();
        // $posts = Post::where("title", "=", "Alice to.")->get();

        return view('home')->with([
            'posts' => $posts
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();

        return view('show')->with([
            'post' => $post
        ]);
    }
}
