<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index($name = null)
    {
        $posts = Post::latest()->paginate(5);
        // $posts = Post::latest()->get();
        // $posts = Post::orderBy("title", "ASC")->get();
        // $posts = Post::where("title", "=", "Alice to.")->get();

        return view('home')->with([
            'posts' => $posts
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('show')->with([
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title' => 'required | min:3 | max:100',
            'body' => 'required | min:10 | max:1000',
            // 'image' => 'required | min:3 | max:100',
            // 'slug' => 'required | min:3 | max:100',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title),
            'body' => $request->body,
            'image' => "https://via.placeholder.com/640x480.png/003333?text=new post",
        ]);

        echo "Article Added Successfully";

        // $post = new Post();

        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->body = $request->body;
        // $post->image = "https://via.placeholder.com/640x480.png/003333?text=new post";
        // $post->save();
    }
}
