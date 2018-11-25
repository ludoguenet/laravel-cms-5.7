@extends('layout') 
@section('content')
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4">
        <h2>{{ $post->title }}</h2>
        <p>{{ str_limit($post->content, 150, '...') }}</p>
        <p><a class="btn btn-secondary" href="{{ route('posts.user.show', ['slug' => $post->slug]) }}" role="button">Lire l'article &raquo;</a></p>
    </div>
    @endforeach
</div>
@endsection
