@extends('layout') 
@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/signin.css') }}">
@endsection
 
@section('content')
<form class="form-signin" action="{{ route('admin.login') }}" method="POST">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal"><span data-feather="log-in"></span> Connexion</h1>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">Votre Mail</label>
        <input type="email" name="email" id="inputEmail" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" placeholder="Votre Mail">        @if($errors->has('email'))
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>@endif
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">Mot de Passe</label>
        <input type="password" name="password" id="inputPassword" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}"
            placeholder="Mot de Passe"> @if($errors->has('password'))
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>@endif
    </div> {{--
    <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> --}}
    <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
</form>
@endsection
