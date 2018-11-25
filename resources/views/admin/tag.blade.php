@extends('admin/layout') 
@section('content')
<form method="POST" action="{{ route('tags.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom du tag</label>
        <input class="form-control" name="name" id="name" type="text">
    </div>
    <div class="form-group">
        <label for="slug">Slug du tag</label>
        <input class="form-control" name="slug" id="slug" type="text">
    </div>
    <input class="btn btn-primary" type="submit" value="Créer le tag">
</form>
@endsection
