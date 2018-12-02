@extends('layout') 
@section('content')

<!-- Standard buttons -->
<a class="btn btn-info btn-block" href="{{ route('posts.user.index') }}"><span data-feather="book-open"></span> Mes publications</a>

<!-- Primary buttons -->
<a class="btn btn-dark btn-block" href="{{ route('home.index') }}"><span data-feather="coffee"></span> Administration</a>
@endsection
