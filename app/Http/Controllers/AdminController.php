<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Enums\PostStatus;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function index()
    {
        $previousUrl=url()->previous();
        if (Auth()->user()->usertype == 'admin')
        {
            if(strpos($previousUrl, '/home') !== false)
            {
                return view('home.homepage');

            }
            else
            {
                return view('admin.adminhome');
            }
        }
        else if (Auth()->user()->usertype == 'user')
            return redirect()->route('blog_homepage');
    }

    public function create()
    {
        return view('admin.post_page');
    }


    public function store(StorePostRequest $request)
    {
        Post::create($request->validatedData() +
            ['status' => PostStatus::ACCEPTED->value]);

            return redirect()->back()->with('message', 'Post Created Successfully');

    }

    public function show_post()
    {
        $posts = Post::with('user')->get();
        return view("admin.show_post", compact('posts'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }

    public function edit(Post $post)
    {
        return view("admin.edit_post", compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validatedData());
        return redirect()->back()->with('message', 'Post Updated Successfully');
    }

    public function acceptPost(Post $post)
    {
        $post->update(['status' => PostStatus::ACCEPTED->value]);

        return redirect()->back()->with('message', 'Post Status Changed to accepted');
    }

    public function rejectPost(Post $post)
    {
        $post->update(['status'=>PostStatus::REJECTED->value]);

        return redirect()->back()->with('message', 'Post Status Changed to rejected');
    }
}
