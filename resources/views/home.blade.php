@extends('layouts.app')

@section('content')
<div class="d-flex" style="min-height: 80vh;">
    

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        <h2 class="mb-4">Welcome to the Library System</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">{{ \App\Models\Student::count() }} total</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Books</h5>
                        <p class="card-text">{{ \App\Models\Book::count() }} total</p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Librarians</h5>
                        <p class="card-text">{{ \App\Models\Librarian::count() }} total</p>
                        <a href="{{ route('librarians.index') }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Borrowings</h5>
                        <p class="card-text">{{ \App\Models\Borrowing::count() }} total</p>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
