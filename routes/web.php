<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LibrarianAuthController;


// Login
Route::get('/librarian/login', [LibrarianAuthController::class, 'loginPage'])
    ->name('librarian.login')->Middleware('LoggedinLibrarianMiddleware');
Route::post('/librarian/login', [LibrarianAuthController::class, 'login'])
    ->name('librarian.login.store');



Route::middleware('auth.librarian.check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // All your existing routes for books, students, borrows
    Route::resource('students', StudentController::class);
    Route::resource('books', BookController::class);
    Route::resource('borrows', BorrowController::class);
    Route::get('borrows-search', [BorrowController::class, 'search'])->name('borrow.search');
    Route::post('borrows-student-search', [BorrowController::class, 'searchStudent'])->name('borrow.student.search');
    Route::get('book-assign/{id}', [BorrowController::class, 'bookAssign'])->name('book.assign');
    Route::get('book-returned/{id}', [BorrowController::class, 'bookReturned'])->name('book.returned');
    Route::get('overdue-borrows', [BorrowController::class, 'overdueBorrow'])->name('overdue.borrows');

    Route::resource('reservation', ReservationController::class);
    // Route::post('/reservation/approve/{id}', [ReservationController::class, 'approve'])->name('reservation.approve');
    Route::get('/reservation/{id}/approve', [ReservationController::class, 'approveForm'])
    ->name('reservation.approve.form');
    Route::post('/reservation/{id}/approve', [ReservationController::class, 'approve'])
        ->name('reservation.approve');

    Route::post('/reservation/cancel/{id}', [ReservationController::class, 'cancel'])->name('reservation.cancel');

    Route::post('/librarian/logout', [LibrarianAuthController::class, 'logout'])->name('logout.librarian');

});


// Public home page (anyone can see)
Route::get('/', function () {
    return view("pages.home");
})->name('home');
