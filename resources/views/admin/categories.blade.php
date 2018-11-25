@extends('admin/layout') 
@section('content')
<h1 class="mb-3">Administration des catégories</h1>
<a class="btn btn-primary mb-3" href="{{ route('categories.create') }}">Créer une catégorie</a>
<ul class="list-group">
    @foreach ($categories as $category)
    <li class="list-group-item">{{ $category->name }}</li>
    @endforeach
</ul>
@endsection
