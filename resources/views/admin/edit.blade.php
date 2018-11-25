@extends('admin/layout') 
@section('content')
<!-- The above form looks like this -->
<form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
    {{ csrf_field() }} {{ method_field('patch') }}
    <div class="form-group">
        <label for="title">Titre</label>
        <input class="form-control" type="text" name="title" placeholder="Votre titre..." id="title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" placeholder="Votre slug..." id="slug" value="{{ $post->slug }}">
    </div>
    <div class="form-group">
        <label for="content">Message</label>
        <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>
    </div>
    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" name="published" id="exampleCheck1" @if ($post->published == 'on')
        checked @endif>
        <label class="form-check-label" for="exampleCheck1">Publier le post</label>
    </div>
    <input class="btn btn-primary" type="submit" value="Editer mon article">
</form>
@endsection
