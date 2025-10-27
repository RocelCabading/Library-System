@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Borrowings</h2>
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Add Borrowing</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Student</th>
                <th>Book</th>
                <th>Librarian</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->student->lname ?? '-' }}, {{ $borrowing->student->fname ?? '-' }} {{ $borrowing->student->mi ?? '' }}</td>
                    <td>{{ $borrowing->book->title ?? '-' }}</td>
                    <td>{{ $borrowing->librarian->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->borrowed_at)->format('Y-m-d') ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->due_at)->format('Y-m-d') ?? '-' }}</td>
                    <td>
                        @if($borrowing->status == 'Borrowed')
                            <span class="badge bg-warning text-dark">Borrowed</span>
                        @elseif($borrowing->status == 'Overdue')
                            <span class="badge bg-danger">Overdue</span>
                        @else
                            <span class="badge bg-secondary">{{ $borrowing->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this borrowing?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No borrowings found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
