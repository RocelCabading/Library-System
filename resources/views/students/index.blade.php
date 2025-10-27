@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Student Number</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>MI</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->studentNumber }}</td>
                <td>{{ $student->lname }}</td>
                <td>{{ $student->fname }}</td>
                <td>{{ $student->mi }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->contactNumber }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this student?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No students found</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
