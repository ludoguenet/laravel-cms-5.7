<?php

namespace App\Http\Controllers;

use App\Models\User\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published', 'on')->orderBy('created_at', 'desc')->get();

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display a post according the slug sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', [
            'post' => $post,
        ]);
    }
}
