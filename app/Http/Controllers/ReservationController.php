<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     // Reservation list
    public function index()
    {
        $reservations = DB::table('reservations')
            ->join('students', 'reservations.student_id', '=', 'students.id')
            ->join('books', 'reservations.book_id', '=', 'books.id')
            ->select(
                'reservations.*',
                'students.name as student_name',
                'books.title as book_title',
                'books.cover as book_cover',
                'books.available_copy as available_copy'
            )
            ->orderBy('reservations.created_at', 'asc')
            ->where('reservations.status', '!=',  'cancelled')
            ->get();


        return view('reservation.index', compact('reservations'));
    }

    // create
    public function create()
    {
        $book = DB::table('books')->get();
         return view('reservation.create-reserve', compact('book'));
    }

    // Store reservation
    public function store(Request $request)
    {
        // check already reserved
        $exists = DB::table('reservations')
            ->where('student_id', $request->student_id)
            ->where('book_id', $request->book_id)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return back()->with('error', 'You already reserved this book!');
        }

        DB::table('reservations')->insert([
            'student_id' => $request->student_id,
            'book_id'    => $request->book_id,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Book Reserved Successfully!');
    }

    // approveForm

    public function approveForm($id)
    {
        $reservation = DB::table('reservations')
            ->join('students', 'reservations.student_id', '=', 'students.id')
            ->join('books', 'reservations.book_id', '=', 'books.id')
            ->select(
                'reservations.*',
                'students.name as student_name',
                'books.title as book_title'
            )
            ->where('reservations.id', $id)
            ->first();

        if (!$reservation || $reservation->status !== 'pending') {
            abort(404);
        }

        return view('reservation.approve', compact('reservation'));
    }



    // Approve reservation (when book returned)
    public function approve(Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required|date|after_or_equal:today',
        ]);

        DB::transaction(function () use ($request, $id) {

            $reservation = DB::table('reservations')->where('id', $id)->first();

            if (!$reservation || $reservation->status !== 'pending') {
                abort(404);
            }

            $book = DB::table('books')->where('id', $reservation->book_id)->first();

            if ($book->available_copy <= 0) {
                abort(400, 'Book not available yet!');
            }

            // Create Borrow
            DB::table('borrows')->insert([
                'student_id'  => $reservation->student_id,
                'book_id'     => $reservation->book_id,
                'issue_date'  => now(),
                'return_date' => $request->return_date,
                'status'      => 'pending',
                'created_at'  => now(),
            ]);

            // Update book
            DB::table('books')
                ->where('id', $reservation->book_id)
                ->decrement('available_copy', 1);

            // Update reservation
            DB::table('reservations')
                ->where('id', $id)
                ->update([
                    'status' => 'approved',
                    'updated_at' => now(),
                ]);
        });

        return redirect()->route('reservation.index')
            ->with('success', 'Reservation approved & book borrowed successfully!');
    }




    // cancel reservation

    public function cancel($id)
    {
        DB::table('reservations')
            ->where('id', $id)
            ->update([
                'status' => 'cancelled',
                'updated_at' => now()
            ]);

        return back()->with('success', 'Reservation Cancelled!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
