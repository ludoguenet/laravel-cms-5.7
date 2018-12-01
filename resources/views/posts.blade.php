@extends('layout') 
@section('content')
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4">
        <h2>{!! $post->title !!}</h2>
        <span data-feather="tag"></span> @foreach ($post->tags as $tag)
        <span class="badge badge-info">{{ $tag->name }}</span> @endforeach
        <p>{{ strip_tags(str_limit($post->content, 100, '...')) }}</p>
        <p><a class="btn btn-secondary" href="{{ route('posts.user.show', ['slug' => $post->slug]) }}" role="button">Lire l'article &raquo;</a></p>
        <p>@foreach ($post->categories as $category)
            <span class="badge badge-success">#{{ $category->name }}</span>@endforeach
        </p>
    </div>
    @endforeach
</div>
@endsection
