@extends('admin/layout') 
@section('content')
<h1>Administration des catégories</h1>
<a class="button button-primary" href="{{ route('categories.create') }}">Créer une catégorie</a>
<ul>
    @foreach ($categories as $category)
    <li><a href="#">{{ $category->name }}</a></li>
    @endforeach
</ul>
@endsection
