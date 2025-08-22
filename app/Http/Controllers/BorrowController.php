<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // For main page borrow list
        $borrows = DB::table('borrows')
                ->join('students', 'borrows.student_id', '=', 'students.id')
                ->join('books', 'borrows.book_id', '=', 'books.id')
                ->select('borrows.*', 'students.name as student_name', 'students.photo as student_photo', 'books.title as book_title', 'books.cover as book_cover')
                ->where('borrows.status', 'pending')
                ->orderBy('return_date', 'asc')
                ->get();

        return view('borrow.index', compact('borrows'));
    }

    /**
     * Overdue borrows listing.
     */
    public function overdueBorrow()
    {
        // For overdue borrows
        $overdueBorrows = DB::table('borrows')
                ->join('students', 'borrows.student_id', '=', 'students.id')
                ->join('books', 'borrows.book_id', '=', 'books.id')
                ->select('borrows.*', 'students.name as student_name', 'students.photo as student_photo', 'books.title as book_title', 'books.cover as book_cover')
                ->where(function($query) {
                    $query->whereDate('borrows.return_date', '<', Carbon::today())
                        ->orWhereDate('borrows.return_date', '=', Carbon::today());
                }) // group কন্ডিশন     // status != returned দুটো condition-এর ওপরই লাগবে
                ->where('borrows.status', '!=', 'returned')
                ->orderBy('return_date', 'asc')
                ->get();

        return view('borrow.borrows-overdue', compact('overdueBorrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('borrow.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        DB::table('borrows')->insert([
            'student_id'    => $request-> student_id,
            'book_id'       => $request-> book_id,
            'issue_date'    =>now(),
            'return_date'   => $request-> return_date,
            'created_at'    => now(),
        ]);

        // Update available copy in books table
        DB::table('books')
            ->where('id', $request->book_id)
            ->decrement('available_copy', 1);

        return back()->with('success', 'Book Assigned Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Borrow Search.
     */
    public function search()
    {
        $students =DB::table('students')->latest()->limit(4)->get();
        return view('borrow.search-borrow-student', compact('students'));
    }

    /**
     * Borrow Student Search.
     */
    public function searchStudent(Request $request)
    {
       $students = DB::table('students')
            ->where('student_id', $request->search)
            ->orWhere('phone', $request->search)
            ->orWhere('email', $request->search)
            ->get();


        // return
        return view('borrow.search-borrow-student', compact('students'));
    }

     /**
     * Book Assign to Student.
     */
     public function bookAssign($id){
        $student = DB::table('students')->where('id', $id)->first();
        $books = DB::table('books')->get();

        return view('borrow.book-assign', compact('student', 'books'));
     }

     /**
     * Book Returned.
     */
     public function bookReturned($id){
        DB::table('borrows')
            ->where('id', $id)
            ->update([
                'status'        => 'returned',
                'updated_at'    =>now()
            ]);


        // available_copy আবার ১ বাড়াও in books table
        $borrow = DB::table('borrows')->where('id', $id)->first();
        DB::table('books')
            ->where('id', $borrow->book_id)
            ->increment('available_copy', 1);


        return back()->with('success', 'Book Returned Successfully!');
     }



}
