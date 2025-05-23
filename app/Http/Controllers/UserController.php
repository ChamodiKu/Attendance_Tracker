<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of user.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new user.
     */
    public function createUi()
    {
        return view('user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function updateUi($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Inactivate the specified user from storage.
     */
    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = 0;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User inactivated successfully.');
    }
}
