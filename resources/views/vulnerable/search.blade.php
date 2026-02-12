@extends('layouts.app')

@section('title', 'Vulnerable Search')
@section('content')
<h2>Vulnerable Search</h2>
<form method="GET" action="/vulnerable/search">
    <div class="mb-3">
        <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>
@if(isset($query))
    <div class="mt-3">
        <strong>Result:</strong>
        {{ $query }}
    </div>
@endif
@endsection
