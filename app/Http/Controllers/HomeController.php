<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'active')->get();
        if (Auth::check())
        {
        $usertype = Auth::user()->usertype;

        if ($usertype == 'user' || $usertype == 'admin')
            return view('home.homepage', compact('posts'));

        }
        return view('home.homepage',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('home.post_details', compact('post'));
    }








}
