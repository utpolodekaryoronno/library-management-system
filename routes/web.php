<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    $totalStudents = DB::table('students')->count();
    $totalBooks = DB::table('books')->count();
    $totalBorrowPending = DB::table('borrows')
    ->where('status', 'pending')
    ->count();
    return view('pages.dashboard', compact('totalStudents', 'totalBooks', 'totalBorrowPending'));
});

Route::resource('students', StudentController::class);
Route::resource('books', BookController::class);
Route::resource('borrows', BorrowController::class);
Route::get('borrows-search', [BorrowController::class, 'search'])->name('borrow.search');
Route::post('borrows-student-search', [BorrowController::class, 'searchStudent'])->name('borrow.student.search');
Route::get('book-assign/{id}', [BorrowController::class, 'bookAssign'])->name('book.assign');
Route::get('book-returned/{id}', [BorrowController::class, 'bookReturned'])->name('book.returned');
Route::get('overdue-borrows', [BorrowController::class, 'overdueBorrow'])->name('overdue.borrows');
