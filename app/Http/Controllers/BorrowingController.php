<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Student;
use App\Models\Book;
use App\Models\Librarian;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('student', 'book', 'librarian')->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $students = Student::all();
        $books = Book::all();
        $librarians = Librarian::all();
        return view('borrowings.create', compact('students', 'books', 'librarians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'librarian_id' => 'nullable|exists:librarians,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
            'status' => 'required|string',
        ]);

        Borrowing::create([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'librarian_id' => $request->librarian_id,
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
            'status' => $request->status,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing recorded successfully.');
    }

    public function edit(Borrowing $borrowing)
    {
        $students = Student::all();
        $books = Book::all();
        $librarians = Librarian::all();
        return view('borrowings.edit', compact('borrowing', 'students', 'books', 'librarians'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'required|exists:books,id',
            'librarian_id' => 'nullable|exists:librarians,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'required|date|after_or_equal:borrowed_at',
            'status' => 'required|string',
        ]);

        $borrowing->update([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'librarian_id' => $request->librarian_id,
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
            'status' => $request->status,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Borrowing updated successfully.');
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Borrowing deleted successfully.');
    }
}
