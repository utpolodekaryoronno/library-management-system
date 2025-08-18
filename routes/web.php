<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::resource('students', StudentController::class);
Route::resource('books', BookController::class);
