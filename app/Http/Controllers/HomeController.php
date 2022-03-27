<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index($name = null)
    {
        $hello = 'Hello from home page';

        return view('home')->with([
            'hello' => $hello,
            'name' => $name
        ]);
    }
}
