@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Borrowing</div>
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Student <span class="text-danger">*</span></label>
                <select name="student_id" class="form-control">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->lname }}, {{ $student->fname }} {{ $student->mi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Book <span class="text-danger">*</span></label>
                <select name="book_id" class="form-control">
                    <option value="">Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Librarian (optional)</label>
                <select name="librarian_id" class="form-control">
                    <option value="">Select Librarian</option>
                    @foreach($librarians as $librarian)
                        <option value="{{ $librarian->id }}">{{ $librarian->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Borrow Date <span class="text-danger">*</span></label>
                <input type="date" name="borrowed_at" class="form-control" value="{{ old('borrowed_at') }}">
            </div>

            <div class="mb-3">
                <label>Return Date <span class="text-danger">*</span></label>
                <input type="date" name="due_at" class="form-control" value="{{ old('due_at') }}">
            </div>

            <div class="mb-3">
                <label>Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="Borrowed" {{ old('status') == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
                    <option value="Overdue" {{ old('status') == 'OverDue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
