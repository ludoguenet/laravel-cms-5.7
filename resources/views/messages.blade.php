@if ($errors->count() > 0) @foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach @endif @if (session()->has('success'))
<p>{{ session()->get('success') }}</p>
@endif
