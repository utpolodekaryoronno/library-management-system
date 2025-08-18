<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->latest()->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // checking data
        // return $request ->all();


        $request->validate([
            'name'          => 'required|max:30|min:3',
            'email'         => 'required|email|unique:students',
            'phone'         => 'required|unique:students|starts_with:013,014,015,016,017,018,018,019',
            'student_id'    => 'required|unique:students',
            'address'       => 'max:200|min:3',
            'photo'         => 'required|mimes:jpg,png,jpeg|max:2024',
        ]);


        // FileName Genarate
        $image = $request ->file('photo');

        $fileName = md5(rand(100000000, 10000000000) . '.' . time() . '.' . str_shuffle("kdhfgdsihiodfidsfids")) . '.' .$image->getClientOriginalExtension();

        // File Upload
        $image ->move(public_path('media/student'), $fileName);

        DB::table('students')->insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'student_id'    => $request->student_id,
            'address'       => $request->address,
            'photo'         => $fileName,
            'created_at'    =>now()
        ]);

        return back()->with('success', 'Student Created Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $student = DB::table('students')->where('id', $id)->first();
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:30|min:3',
            'phone' => 'required|starts_with:013,014,015,016,017,018,019|unique:students,phone,' . $id . ',id',
            'address'       => 'max:200|min:3',
            'photo'         => 'required|mimes:jpg,png,jpeg|max:2024',
        ]);

        $student = DB::table('students')->where('id', $id)->first();

         // Default to previous image path
        $fileName = $student ->photo;

        // photo upload
        if ($request->hasFile('photo')) {
            $image = $request ->file('photo');

            $fileName = md5(rand(100000000, 10000000000) . '.' . time() . '.' . str_shuffle("kdhfgdsihiodfidsfids")). '.' . $image->getClientOriginalExtension();

            $image ->move(public_path('media/student'), $fileName);

             // Optionally: Delete old image file if exists
            if ($student->photo && file_exists(public_path('media/student/' . $student->photo))) {
                unlink(public_path('media/student/' . $student->photo));
            }
        }

        // Database update
        DB::table('students')->where('id', $id)->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'photo'         => $fileName,
            'updated_at'    =>now()
        ]);

        return redirect()->route('students.index')->with('success', 'Student Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        // If there's a cover image, delete it from storage (optional)
        if($student->photo && file_exists(public_path('media/student/' .$student->photo))){
            unlink(public_path('media/student/' .$student->photo));
        }

        DB::table('students')->where('id', $id)->delete();

        return back()->with('success', 'Student Delete Successful');
    }
}
