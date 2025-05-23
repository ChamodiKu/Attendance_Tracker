<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of subjects.
     */
    public function index(Request $request)
    {
        $searchKey = $request->searchKey;
        $subjects = Subject::where('code', 'like', '%' . $searchKey . '%')
                           ->orWhere('name', 'like', '%' . $searchKey . '%')
                           ->get();
                           
        return view('subjects.index', compact('subjects', 'searchKey'));
    }

    /**
     * Show the form for creating a new subject.
     */
    public function createUi()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created subject in storage.
     */
    public function create(Request $request)
    {
        $subject = new Subject();
        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->status = $request->status;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Show the form for editing the specified subject.
     */
    public function updateUi($id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('subjects.update', compact('subject'));
    }

    /**
     * Update the specified subject in storage.
     */
    public function update($id, Request $request)
    {
        $subject = Subject::where('id', $id)->first();
        $subject->code = $request->code;
        $subject->name = $request->name;
        $subject->start_date = $request->start_date;
        $subject->end_date = $request->end_date;
        $subject->status = $request->status;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    /**
     * Inactivate the specified subject from storage.
     */
    public function delete($id)
    {
        $subject = Subject::where('id', $id)->first();
        $subject->status = 0;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Subject inactivated successfully.');
    }
}
