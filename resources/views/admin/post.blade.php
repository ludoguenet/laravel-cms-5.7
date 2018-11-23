@extends('admin/layout') 
@section('content')
<!-- The above form looks like this -->
<form method="POST" action="{{ route('posts.store') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="six columns">
            <label for="title">Titre</label>
            <input class="u-full-width" type="text" name="title" placeholder="Votre titre..." id="title" value="{{ old('title') }}">
        </div>
        <div class="six columns">
            <label for="slug">Slug</label>
            <input class="u-full-width" type="text" name="slug" placeholder="Votre slug..." id="slug" value="{{ old('slug') }}">
        </div>
    </div>
    <label for="content">Message</label>
    <textarea class="u-full-width" name="content" placeholder="Exprimez-vous..." id="content"></textarea>
    <input class="button-primary" type="submit" value="Poster mon article">
</form>
@endsection
