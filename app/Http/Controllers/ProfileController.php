<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();

        return view('profile', ['user' => $user]);
    }
    public function edit(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'school_year' => 'required',
            'biography' => 'required'
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->school_year = $request->school_year;
        $user->biography = $request->biography;
        $user->save();
        return back();
    }
}
