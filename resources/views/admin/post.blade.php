@extends('admin/layout') 
@section('content')
<!-- The above form looks like this -->
<form method="POST" action="{{ route('posts.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Titre</label>
        <input class="form-control" type="text" name="title" placeholder="Votre titre..." id="title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="content">Message</label>
        <textarea class="form-control" rows="10" name="content" placeholder="Exprimez-vous..." id="content"></textarea>
    </div>
    <div class="form-group">
        <label for="categories">Catégories</label>
        <select multiple class="form-control" name="categories[]" id="categories">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control" name="tags[]" id="tags">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="published" id="exampleCheck1" checked>
            <label class="form-check-label" for="exampleCheck1">Publier le post</label>
        </div>
    </div>
    <input class="btn btn-primary" type="submit" value="Poster mon article">
</form>
@endsection
 
@section('extra-js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea' });

</script>
@endsection
