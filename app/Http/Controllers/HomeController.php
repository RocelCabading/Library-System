<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Librarian;
use App\Models\Borrowing;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Total counts
        $students_count = Student::count();
        $books_count = Book::count();
        $librarians_count = Librarian::count();

        // Borrowed books (status = 'Borrowed')
        $borrowed_books_count = Borrowing::where('status', 'Borrowed')->count();

        // Available books (status = 'Available')
        $available_books_count = Borrowing::where('status', 'Available')->count();

        // Monthly report
        $monthly_borrowings = Borrowing::whereMonth('borrowed_at', $currentMonth)
                                       ->whereYear('borrowed_at', $currentYear)
                                       ->count();

        $new_students = Student::whereMonth('created_at', $currentMonth)
                               ->whereYear('created_at', $currentYear)
                               ->count();

        $new_books = Book::whereMonth('created_at', $currentMonth)
                         ->whereYear('created_at', $currentYear)
                         ->count();

        return view('dashboard', compact(
            'students_count',
            'books_count',
            'librarians_count',
            'borrowed_books_count',
            'available_books_count',
            'monthly_borrowings',
            'new_students',
            'new_books'
        ));
    }
}
