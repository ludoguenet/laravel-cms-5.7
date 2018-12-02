@extends('layout') 
@section('content')
<div class="row">
    @forelse ($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{!! $post->title !!}</h2>
                </div>
                <small class="card-text">
                    Publié {{ $post->created_at->diffForHumans()}}
                </small>
                <p class="card-text">{{ strip_tags(str_limit($post->content, 100, '...')) }}</p>
                <p><a class="btn btn-secondary" href="{{ route('posts.user.show', ['slug' => $post->slug]) }}" role="button">Lire l'article &raquo;</a></p>
                <p>Catégories : @foreach ($post->categories as $category)
                    <span class="badge badge-primary"><a class="text-white" href="{{route('posts.user.category', ['category' => $category->slug]) }}">{{ $category->name }}</a></span>@endforeach
                </p>
            </div>
        </div>
    </div>
    @empty
    <h2>Vous n'avez encore rien publié!</h2>
    @endforelse
</div>
{{ $posts->links() }}
@endsection
