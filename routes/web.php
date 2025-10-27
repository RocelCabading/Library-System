<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\HomeController;

// Home / Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// CRUD Resources
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('students', StudentController::class);
Route::resource('librarians', LibrarianController::class);
Route::resource('borrowings', BorrowingController::class);

// Student view borrowings
Route::get('my-borrowings', [BorrowingController::class, 'myBorrowings'])->name('borrowings.my');
