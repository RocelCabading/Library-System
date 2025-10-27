@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Student</div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Student Number</label>
                <input type="text" name="studentNumber" class="form-control" value="{{ old('studentNumber', $student->studentNumber) }}">
                @error('studentNumber') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{ old('lname', $student->lname) }}">
                @error('lname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" value="{{ old('fname', $student->fname) }}">
                @error('fname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Middle Initial</label>
                <input type="text" name="mi" class="form-control" value="{{ old('mi', $student->mi) }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Contact Number</label>
                <input type="text" name="contactNumber" class="form-control" value="{{ old('contactNumber', $student->contactNumber) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
