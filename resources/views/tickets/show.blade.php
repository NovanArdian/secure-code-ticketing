@extends('layouts.app')

@section('title', 'Detail Ticket')
@section('content')
<h2>Detail Ticket</h2>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{ $ticket->title }}</h5>
        <p class="card-text">{{ $ticket->description }}</p>
        <p class="card-text"><strong>Status:</strong> {{ $ticket->status }}</p>
        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
