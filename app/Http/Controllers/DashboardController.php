<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $totalStudents = DB::table('students')->count();
        $totalBooks = DB::table('books')->count();
        $totalBorrowPending = DB::table('borrows')
        ->where('status', 'pending')
        ->count();
        return view('pages.dashboard', compact('totalStudents', 'totalBooks', 'totalBorrowPending'));
    }
}
