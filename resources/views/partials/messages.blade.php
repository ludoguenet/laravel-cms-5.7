@if ($errors->count() > 0) @foreach ($errors->all() as $error)
<div class="alert alert-warning" role="alert">
    {{ $error }}
</div>
@endforeach @endif @if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@endif
