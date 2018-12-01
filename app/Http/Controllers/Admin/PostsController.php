<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin/posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin/post', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $post = Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title'), '-'),
            'content' => request('content'),
            'published' => request('published'),
        ]);

        $post->categories()->sync(request('categories'));
        $post->tags()->sync(request('tags'));

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Votre post a été créé!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin/edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        request()->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);

        $post->title = request('title');
        $post->content = request('content');
        $post->slug = str_slug(request('title'));
        $post->published = request('published');
        $post->categories()->sync(request('categories'));
        $post->tags()->sync(request('tags'));

        $post->save();

        return redirect()->route('home.index')->with('success', 'Votre article a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home.index')->with('success', 'Votre article a été supprimé');

    }
}
