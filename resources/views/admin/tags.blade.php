@extends('admin/layout') 
@section('content')
<h1 class="mb-3">Administration des tags</h1>
<a class="btn btn-primary mb-3" href="{{ route('tags.create') }}">Créer un tag</a>
<ul class="list-group">
    @foreach ($tags as $tag)
    <li class="list-group-item">{{ $tag->name }}</li>
    @endforeach
</ul>
@endsection
