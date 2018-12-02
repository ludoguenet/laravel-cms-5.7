@extends('admin/layout') 
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" />
@endsection
 
@section('content')
<!-- The above form looks like this -->
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Titre</label>
        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" placeholder="Votre titre..."
            id="title" value="{{ old('title') }}">
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    </div>
    <div class="form-group">
        <label for="content">Message</label>
        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" rows="7" name="content" id="content"></textarea>
        <div class="invalid-feedback">
            {{ $errors->first('content') }}
        </div>
    </div>
    <div class="form-group">
        <label for="categories">Catégories</label>
        <select class="selectpicker {{ $errors->has('categories') ? 'is-invalid' : '' }}" multiple name="categories[]" id="categories">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="selectpicker {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="image">
            <label class="custom-file-label" for="image">Choisir une image</label>
            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
        </div>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" name="published" class="custom-control-input" id="published">
            <label class="custom-control-label" for="published">Publier le post ?</label>
        </div>
    </div>
    <input class="btn btn-outline-primary" type="submit" value="Poster mon article">
</form>
@endsection
 
@section('extra-js')
<script src="{{ asset('js/bootstrap-select.js') }}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea' });
    $('select').selectpicker();

</script>
@endsection
