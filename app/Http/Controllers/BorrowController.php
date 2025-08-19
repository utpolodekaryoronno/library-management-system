<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('borrow.index');
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
        //
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
        $students =DB::table('students')->get();
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


}
