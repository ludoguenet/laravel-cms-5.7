@extends('admin/layout') 
@section('content')
<h1 class="mb-3">Administration des posts</h1>
<a class="btn btn-primary mb-3" href="{{ route('posts.create') }}">Créer un post</a>
<ul class="list-group">
    @foreach ($posts as $post)
    <li class="list-group-item">{{ $post->title }}</li>
    @endforeach
</ul>
@endsection
