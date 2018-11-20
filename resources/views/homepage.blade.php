@extends('layout') 
@section('content')
<h5>CMS développé par <a href="https://ludoguenet.github.io/">Ludovic Guénet</a> avec Laravel.</h5>
<!-- Standard buttons -->
<a class="button" href="{{ route('posts') }}">Lire les posts</a>

<!-- Primary buttons -->
<a class="button button-primary" href="{{ route('home.index') }}">Administration</a>
@endsection
