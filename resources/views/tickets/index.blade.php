@extends('layouts.app')

@section('title', 'Daftar Tickets')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Tickets</h2>
    <a href="{{ route('tickets.create') }}" class="btn btn-primary">Buat Ticket Baru</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->status }}</td>
            <td>
                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus ticket ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
