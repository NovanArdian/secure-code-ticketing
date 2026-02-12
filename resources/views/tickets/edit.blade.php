@extends('layouts.app')

@section('title', 'Edit Ticket')
@section('content')
<h2>Edit Ticket</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $ticket->title) }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $ticket->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="open" {{ old('status', $ticket->status)=='open' ? 'selected' : '' }}>Open</option>
            <option value="closed" {{ old('status', $ticket->status)=='closed' ? 'selected' : '' }}>Closed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
