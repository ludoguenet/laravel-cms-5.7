<?php

namespace App\Http\Controllers;

use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('published', 'on')->orderBy('created_at', 'desc')->paginate(6);

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display a post according to the slug sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $slug)
    {
        return view('post', [
            'post' => $slug,
        ]);
    }

    /**
     * Display posts according to the tag sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag(Tag $tag)
    {
        $posts = $tag->posts();

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display posts according to the tag sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        $posts = $category->posts();

        return view('posts', [
            'posts' => $posts,
        ]);
    }
}
