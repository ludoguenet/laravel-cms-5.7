@extends('admin/layout') 
@section('content')
<h2>Bonjour Administrateur.</h2>

<ul>
    <li><a href="{{ route('posts.index') }}">Administrer les posts</a></li>
    <li><a href="{{ route('categories.index') }}">Administrer les catégories</a></li>
    <li><a href="{{ route('tags.index') }}">Administrer les tags</a></li>
</ul>
@endsection
