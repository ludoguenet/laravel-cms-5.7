@extends('admin/layout') 
@section('content')
<h1>Administration des tags</h1>
<a class="button button-primary" href="{{ route('tags.create') }}">Créer un tag</a>
<ul>
    @foreach ($tags as $tag)
    <li><a href="#">{{ $tag->name }}</a></li>
    @endforeach
</ul>
@endsection
