<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(18);
        // $posts = Post::latest()->get();
        // $posts = Post::orderBy("title", "ASC")->get();
        // $posts = Post::where("title", "=", "Alice to.")->get();

        return view('home')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $this->validate($request, [
        //     'title' => 'required | min:3 | max:100',
        //     'body' => 'required | min:10 | max:1000'
        // ]);

        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }

        Post::create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title),
            'body' => $request->body,
            'image' => $image_name,
            'user_id' => auth()->user()->id
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show')->with([
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('edit')->with([
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            // unlink(public_path('uploads') . '/' . $post->image);

            echo "

        <script>
            window.alert($request->imag)
            window.alert($post->image)
        </script>
        
        ";
            File::delete('uploads' . '/' . $post->image);
            $post->image = $image_name;
        }


        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $post->image,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('home')->with([
            'success' => 'Article updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete('uploads' . '/' . $post->image);
        $post->delete();

        return redirect()->route('home')->with([
            'success' => 'Article deleted successfully'
        ]);
    }
}
