<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollementController extends Controller
{
    /**
     * Display a listing of entrollement.
     */
    public function index()
    {
        return view('entrollement.index');
    }

    /**
     * Show the form for creating a new enrollement.
     */
    public function createUi()
    {
        return view('entrollement.create');
    }

    /**
     * Store a newly created enrollement in storage.
     */
    public function create(Request $request)
    {
        $enrollement = new Enrollment();
        $enrollement->student_id = $request->student_id;
        $enrollement->subject_id = $request->subject_id;
        $enrollement->start_date = $request->start_date;
        $enrollement->end_date = $request->end_date;
        $enrollement->status = $request->status;
        $enrollement->save();

        return redirect()->route('entrollement.index')->with('success', 'Enrolled successfully.');
    }

    /**
     * Show the form for editing the specified enrollement.
     */
    public function updateUi($id)
    {
        $enrollement = Enrollment::where('id', $id)->first();
        return view('entrollement.update', compact('enrollement'));
    }

    /**
     * Update the specified enrollement in storage.
     */
    public function update($id, Request $request)
    {
        $enrollement = Enrollment::where('id', $id)->first();
        $enrollement->student_id = $request->student_id;
        $enrollement->subject_id = $request->subject_id;
        $enrollement->start_date = $request->start_date;
        $enrollement->end_date = $request->end_date;
        $enrollement->status = $request->status;
        $enrollement->save();

        return redirect()->route('entrollement.index')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Inactivate the specified enrollement from storage.
     */
    public function delete($id)
    {
        $enrollement = Enrollment::where('id', $id)->first();
        $enrollement->status = 0;
        $enrollement->save();

        return redirect()->route('entrollement.index')->with('success', 'Enrollment inactivated successfully.');
    }

    /**
     * get enrolled students related to subject
     */
    public function getStudents(Request $request)
    {
        $enrollements = Enrollment::where('subject_id', $request->selectedSubject)->with('student')->get();

        response()->json($enrollements);
    }
}
