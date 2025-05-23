<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of attendance.
     */
    public function index()
    {
        return view('attendance.index');
    }

    /**
     * Show the form for creating a new attendance.
     */
    public function createUi(Request $request)
    {
        $subjects = Subject::where('status',1)->get();
        $selectedSubject = $request->filled('selectedSubject') ? $request->selectedSubject : 0;
        return view('attendance.create', compact('subjects','selectedSubject'));
    }

    /**
     * Store a newly created attendance in storage.
     */
    public function create(Request $request)
    {
        $attendance = new Attendance();
        $attendance->student_id = $request->student_id;
        $attendance->subject_id = $request->subject_id;
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance saved successfully.');
    }

    /**
     * Show the form for editing the specified attendance.
     */
    public function updateUi($id)
    {
        $attendance = Attendance::where('id', $id)->first();
        return view('attendance.update', compact('attendance'));
    }

    /**
     * Update the specified attendance in storage.
     */
    public function update($id, Request $request)
    {
        $attendance = Attendance::where('id', $id)->first();
        $attendance->student_id = $request->student_id;
        $attendance->subject_id = $request->subject_id;
        $attendance->date = $request->date;
        $attendance->status = $request->status;
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Inactivate the specified attendance from storage.
     */
    public function delete($id)
    {
        $attendance = Attendance::where('id', $id)->first();
        $attendance->status = 0;
        $attendance->save();

        return redirect()->route('attendance.index')->with('success', 'Attendance inactivated successfully.');
    }
}
