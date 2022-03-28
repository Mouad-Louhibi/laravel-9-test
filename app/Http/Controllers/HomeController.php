<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($name = null)
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'post title 1',
                'body' => 'post body 1'
            ],
            [
                'id' => 2,
                'title' => 'post title 2',
                'body' => 'post body 2'
            ],
            [
                'id' => 3,
                'title' => 'post title 3',
                'body' => 'post body 3'
            ]
        ];

        return view('home')->with([
            'posts' => $posts
        ]);
    }
}
