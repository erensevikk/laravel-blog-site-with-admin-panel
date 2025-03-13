<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Enums\PostStatus;
use Illuminate\Support\Facades\Auth;
use Alert;

class PostController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->paginate(2);
        return view('home.my_post', compact('posts'));
    }

    public function create()
    {
        return view('home.create_post');
    }

    public function store(StorePostRequest $request)
    {
        $status = auth()->user()->usertype === 'admin' ? PostStatus::ACCEPTED->value : PostStatus::PENDING->value;
        Post::create($request->validatedData() +
            ['status' => $status]);

        Alert::success('Congratulations!', 'Your post has been created');
        return redirect()->route('my-posts.index');
    }

    public function show(Post $posts)
    {
        return view('home.post_details', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('home.my_post_edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validatedData());

        Alert::success('Success!', 'Your post has been updated');
        return redirect()->route('my-posts.index');
    }

    public function destroy(Post $post)
    {
        $previousUrl=url()->previous();
        $post->delete();
        Alert::success('Success!', 'Your post has been deleted');

        if(strpos($previousUrl, 'post/details'))
            return redirect()->route('home');

        return redirect()->route('my-posts.index');
    }
}
