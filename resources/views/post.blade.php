@extends('layout') 
@section('content')
<h1>{{ $post->title }}</h1>
<small>Publié le {{ $post->created_at->format('d M Y') }}</small>
<hr>
<p class="lead">{{ $post->content }}</p>
@endsection
