@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Librarians</h2>
    <a href="{{ route('librarians.create') }}" class="btn btn-primary">Add Librarian</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($librarians as $librarian)
            <tr>
                <td>{{ $librarian->id }}</td>
                <td>{{ $librarian->name }}</td>
                <td>{{ $librarian->email }}</td>
                <td>{{ $librarian->phone }}</td>
                <td>
                    <a href="{{ route('librarians.edit', $librarian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('librarians.destroy', $librarian->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this librarian?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No librarians found</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
