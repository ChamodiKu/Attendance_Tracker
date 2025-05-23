<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new student.
     */
    public function createUi()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function create(Request $request)
    {
        $student = new Student();
        $student->registration_no = $request->registration_no;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function updateUi($id)
    {
        $student = Student::where('id', $id)->first();
        return view('students.update', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update($id, Request $request)
    {
        $student = Student::where('id', $id)->first();
        $student->registration_no = $request->registration_no;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Inactivate the specified student from storage.
     */
    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        $student->status = 0;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student inactivated successfully.');
    }
}
