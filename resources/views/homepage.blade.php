@extends('layout') 
@section('content')
<h5>CMS développé par <a href="https://ludoguenet.github.io/">Ludovic Guénet</a> avec Laravel 5.7 et Bootstrap 4.</h5>
<!-- Standard buttons -->
<a class="btn btn-info" href="{{ route('posts.user.index') }}"><span data-feather="book-open"></span> Mes publications</a>

<!-- Primary buttons -->
<a class="btn btn-dark" href="{{ route('home.index') }}"><span data-feather="coffee"></span> Administration</a>
@endsection
