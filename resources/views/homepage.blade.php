@extends('layout') 
@section('content')
<h5>CMS développé par <a href="https://ludoguenet.github.io/">Ludovic Guénet</a> avec Laravel et Bootstrap 4.</h5>
<!-- Standard buttons -->
<a class="btn btn-info" href="{{ route('posts.user.index') }}">Mes publications</a>

<!-- Primary buttons -->
<a class="btn btn-light" href="{{ route('home.index') }}">Administration</a>
@endsection
