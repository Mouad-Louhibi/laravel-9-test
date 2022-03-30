<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;

class HomeController extends Controller
{
    //
    public function index($name = null)
    {
        $posts = Post::latest()->paginate(6);
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

    public function store(PostRequest $request)
    {
        // dd($request->all());

        // $this->validate($request, [
        //     'title' => 'required | min:3 | max:100',
        //     'body' => 'required | min:10 | max:1000'
        // ]);

        Post::create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title),
            'body' => $request->body,
            'image' => "https://via.placeholder.com/640x480.png/003333?text=new post",
        ]);

        return redirect()->route('home')->with([
            'success' => 'Article added successfully'
        ]);

        // $post = new Post();

        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->body = $request->body;
        // $post->image = "https://via.placeholder.com/640x480.png/003333?text=new post";
        // $post->save();
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('edit')->with([
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => "https://via.placeholder.com/640x480.png/003333?text=new post",
            'body' => $request->body
        ]);

        return redirect()->route('home')->with([
            'success' => 'Article updated successfully'
        ]);
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();

        return redirect()->route('home')->with([
            'success' => 'Article deleted successfully'
        ]);
    }
}
