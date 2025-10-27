@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Add Book</div>
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Author <span class="text-danger">*</span></label>
                <input type="text" name="author" class="form-control" value="{{ old('author') }}">
                @error('author') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>ISBN <span class="text-danger">*</span></label>
                <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}">
                @error('isbn') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Category <span class="text-danger">*</span></label>
                <select name="category_id" class="form-select">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Published At</label>
                <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
