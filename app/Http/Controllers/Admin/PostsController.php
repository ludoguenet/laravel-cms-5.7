<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use App\Models\User\Post;
use App\Models\User\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
            'categories' => ['required'],
            'tags' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if (request()->hasFile('image')) {
            $imageName = request('image')->getClientOriginalName();
            request()->file('image')->storeAs(
                'public/images', $imageName
            );
        }

        $post = Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title'), '-'),
            'content' => request('content'),
            'published' => request('published'),
            'image' => $imageName,
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
            'categories' => ['required'],
            'tags' => ['required'],
            'image' => ['image'],
        ]);

        $post->title = request('title');
        $post->content = request('content');
        $post->slug = str_slug(request('title'));
        $post->published = request('published');

        if (request()->hasFile('image')) {
            Storage::delete('public/images/' . $post->image);
            $imageName = request('image')->getClientOriginalName();
            request()->file('image')->storeAs(
                'public/images', $imageName
            );
            $post->image = $imageName;
        }

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

        Storage::delete('public/images/' . $post->image);
        $post->delete();

        return redirect()->route('home.index')->with('success', 'Votre article a été supprimé');

    }
}
