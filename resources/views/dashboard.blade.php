@extends('layouts.app')

@section('content')
<h2 class="mb-4">Library Dashboard</h2>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Category</h5>
                <p class="card-text">{{ \App\Models\Category::count() }} total</p>
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text">{{ \App\Models\Student::count() }} total</p>
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Books</h5>
                <p class="card-text">{{ \App\Models\Book::count() }} total</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Librarians</h5>
                <p class="card-text">{{ \App\Models\Librarian::count() }} total</p>
                <a href="{{ route('librarians.index') }}" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Borrowings</h5>
                <p class="card-text">{{ \App\Models\Borrowing::count() }} total</p>
                <a href="{{ route('borrowings.index') }}" class="btn btn-primary btn-sm">View</a>
            </div>
        </div>
    </div>
</div>

<h3 class="mt-5 mb-3">Monthly Report ({{ \Carbon\Carbon::now()->format('F Y') }})</h3>
<div class="row g-4">
    <div class="col-md-3">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Borrowed Books</h5>
            <p class="card-text">{{ $borrowed_books_count }} total</p>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Overdue Books</h5>
            <p class="card-text">{{ $available_books_count }} total</p>
        </div>
    </div>
</div>


    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">New Students</h5>
                <p class="card-text">{{ $new_students }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">New Books</h5>
                <p class="card-text">{{ $new_books }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

