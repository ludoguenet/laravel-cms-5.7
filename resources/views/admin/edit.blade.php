@extends('admin/layout') 
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" />
@endsection
 
@section('content')
<!-- The above form looks like this -->
<form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }} {{ method_field('patch') }}
    <div class="form-group">
        <label for="title">Titre</label>
        <input class="form-control @if($errors->has('title'))is-invalid @endif" type="text" name="title" placeholder="Votre titre..."
            id="title" value="{{ $post->title }}">
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    </div>
    <div class="form-group">
        <label for="content">Message</label>
        <textarea class="form-control @if($errors->has('content'))is-invalid @endif" name="content" rows="10" id="content">{{ $post->content }}</textarea>
        <div class="invalid-feedback">
            {{ $errors->first('content') }}
        </div>
    </div>
    <div class="form-group">
        <label for="categories">Catégories</label>
        <select multiple class="selectpicker @if($errors->has('categories'))is-invalid @endif" name="categories[]" id="categories">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @foreach ($post->categories as $postCategory)
                    @if ($postCategory->id === $category->id)
                        selected
                    @endif
                @endforeach
                >{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="selectpicker @if($errors->has('tags'))is-invalid @endif" name="tags[]" id="tags">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                @foreach ($post->tags as $postTags)
                @if ($postTags->id === $tag->id)
                    selected
                @endif
            @endforeach>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @if($errors->has('image')) is-invalid @endif" name="image" id="image">
            <label class="custom-file-label" for="image">Choisir une image</label>
            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
        </div>
    </div>
    <img src="{{ asset('storage/images/' . $post->image . '') }}" alt="{{ $post->image }}" width="100%" class="my-3">
    <div class="form-group">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" name="published" class="custom-control-input" id="published" @if($post->published ===
            'on') checked @endif>
            <label class="custom-control-label" for="published">Publier le post ?</label>
        </div>
    </div>
    <input class="btn btn-primary" type="submit" value="Éditer mon article">
</form>
@endsection
 
@section('extra-js')
<script src="{{ asset('js/bootstrap-select.js ') }}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea ' });
    $('select ').selectpicker();

</script>
@endsection
