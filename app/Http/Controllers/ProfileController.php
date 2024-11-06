<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'teacher') {
            return view('teacher.profile', compact('user'));
        } elseif ($user->role == 'student') {
            return view('student.profile', compact('user'));
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Role not recognized.']);
        }
    }

    public function edit()
    {
        $user = Auth::user();

        if ($user->role == 'teacher') {
            return view('teacher.edit-profile', compact('user'));
        } elseif ($user->role == 'student') {
            return view('student.edit-profile', compact('user'));
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Role not recognized.']);
        }
    }



    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contact' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Validation for password
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');

        // Check if the password field is not empty and hash it using Hash facade
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
