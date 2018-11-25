@extends('admin/layout') 
@section('content')
<h3>Mes articles</h3>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Aperçu</th>
                <th>Créé le</th>
                <th>Publié ?</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ str_limit($post->content, 50, '...') }}</td>
                <td>{{ $post->created_at->format('d M Y') }}</td>
                <td>
                    @if ($post->published == 'on')
                    <span data-feather='check-square'></span> @else
                    <span data-feather='x'></span> @endif
                </td>
                <td><a href="{{ route('posts.edit', ['id' => $post->id]) }}"><span data-feather='edit'></span></a></td>
                <td>
                    <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <button style="border:none; cursor:pointer;" type="submit"><span data-feather='trash'></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
