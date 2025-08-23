<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books =DB::table('books')->latest()->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // for checking
        // return $request -> all();

        $request->validate([
            'title'     => 'required',
            'author'    => 'required',
            'cover'     => 'required | mimes:jpeg,png,jpg | max:2024',
            'isbn'      => 'required',
            'copy'      => 'required | integer',
        ]);

        // FileName Genarate
        $image = $request ->file('cover');

        $fileName = md5(rand(100000000, 10000000000) . '.' . time() . '.' . str_shuffle("kdhfgdsihiodfidsfids")) . '.' .$image->getClientOriginalExtension();

        // File Upload
        $image ->move(public_path('media/book'), $fileName);

        DB::table('books')->insert([
            'title'             => $request ->title,
            'author'            => $request ->author,
            'cover'             => $fileName,
            'isbn'              => $request ->isbn,
            'copy'              => $request ->copy,
            'available_copy'    => $request ->copy,
            'created_at'        =>now()
        ]);

        return back()-> with('success', 'Book Created Successful');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        $thisBookBorrowedList = DB::table('borrows')
            ->join('students', 'borrows.student_id', '=', 'students.id')
            ->where('borrows.book_id', $id)
            ->where('borrows.status', 'pending')
            ->select('borrows.*', 'students.name as student_name', 'students.photo as student_photo')
            ->get();

        return view('book.show', compact('book', 'thisBookBorrowedList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book =DB::table('books')->where('id', $id)->first();
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title'     => 'required',
            'author'    => 'required',
            'cover'     => 'mimes:jpeg,png,jpg | max:2024',
            'isbn'      => 'required',
            'copy'      => 'required | integer',
        ]);

        $book = DB::table('books')->where('id', $id)->first();

        // Default to previous image path
        $fileName = $book ->cover;

        // Cover upload
        if ($request->hasFile('cover')) {
            $image = $request ->file('cover');

            $fileName = md5(rand(100000000, 10000000000) . '.' . time() . '.' . str_shuffle("kdhfgdsihiodfidsfids")). '.' . $image->getClientOriginalExtension();

            $image ->move(public_path('media/book'), $fileName);

             // Optionally: Delete old image file if exists
            if ($book->cover && file_exists(public_path('media/book/' . $book->cover))) {
                unlink(public_path('media/book/' . $book->cover));
            }
        }


        // update database
        DB::table('books')->where('id', $id)->update([
            'title'             => $request ->title,
            'author'            => $request ->author,
            'cover'             => $fileName,
            'isbn'              => $request ->isbn,
            'copy'              => $request ->copy,
            'available_copy'    => $request ->copy,
            'updated_at'        => now(),
        ]);

        return redirect()->route('books.index')->with('success', 'Book Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        // If there's a cover image, delete it from storage (optional)
        if ($book->cover && file_exists(public_path('media/book/' . $book->cover))) {
            unlink(public_path('media/book/' . $book->cover));
        }

        DB::table('books')->where('id', $id)->delete();

        return back()->with('success', 'Book Updated Successful');
    }
}
