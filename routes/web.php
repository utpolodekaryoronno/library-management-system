<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::resource('students', StudentController::class);
Route::resource('books', BookController::class);
Route::resource('borrows', BorrowController::class);
Route::get('borrows-search', [BorrowController::class, 'search'])->name('borrow.search');
Route::post('borrows-student-search', [BorrowController::class, 'searchStudent'])->name('borrow.student.search');
Route::get('book-assign/{id}', [BorrowController::class, 'bookAssign'])->name('book.assign');
