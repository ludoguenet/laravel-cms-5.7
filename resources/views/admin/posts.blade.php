@extends('admin/layout') 
@section('content')
<h1>Administration des posts</h1>
<a class="button button-primary" href="{{ route('posts.create') }}">Créer un post</a>
<ul>
    @foreach ($posts as $post)
    <li><a href="#">{{ $post->title }}</a></li>
    @endforeach
</ul>
@endsection
