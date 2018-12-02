@extends('layout') 
@section('content')
<h1>{{ $post->title }}</h1>
<small><span data-feather='clock' width="12.8px"></span> Publié {{ $post->created_at->diffForHumans() }}</small>
<hr> <span data-feather="tag"></span>Tags : @foreach ($post->tags as $tag)
<span class="badge badge-warning"><a class="text-dark" href="{{ route('posts.user.tag', ['tag' => $tag->slug])}}">{{ $tag->name }}</a></span>&nbsp;@endforeach
<img src="{{ asset('storage/images/' . $post->image . '') }}" width="100%" class="my-3" alt="{{ $post->image }}">
<p class="lead">{!! $post->content !!}</p>
@endsection
