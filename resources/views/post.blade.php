@extends('layout') 
@section('content')
<h1>{{ $post->title }}</h1>
<small><span data-feather='clock' width="12.8px"></span> Publié le {{ $post->created_at->format('d M Y') }}</small>
<hr>
<p class="lead">{!! $post->content !!}</p>
@endsection
