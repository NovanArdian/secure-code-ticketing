@extends('layouts.app')

@section('title', 'Komentar Aman')
@section('content')
<h2>Form Komentar Aman</h2>
<form method="POST" action="/vulnerable/comment">
    @csrf
    <div class="mb-3">
        <textarea name="comment" class="form-control" placeholder="Tulis komentar..." required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@if(isset($comment))
    <div class="mt-3">
        <strong>Komentar:</strong>
        {{ $comment }}
    </div>
@endif
@endsection
