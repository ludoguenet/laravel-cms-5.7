@extends('admin/layout') 
@section('content')
<form method="POST" action="{{ route('tags.store') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="six columns">
            <label for="name">Nom du tag</label>
            <input class="u-full-width" name="name" id="name" type="text">
        </div>
        <div class="six columns">
            <label for="slug">Slug du tag</label>
            <input class="u-full-width" name="slug" id="slug" type="text">
        </div>
    </div>
    <input class="button-primary" type="submit" value="Créer le tag">
</form>
@endsection
