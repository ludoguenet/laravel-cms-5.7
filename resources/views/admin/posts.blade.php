@extends('admin/layout') 
@section('content')
<h1>Administration des posts</h1>
<a class="button button-primary" href="{{ route('posts.create') }}">Créer un post</a> @foreach ($posts as $post)
<ul>
    <li><a href="#">{{ $post->title }}</a></li>
</ul>
@endforeach
@endsection
