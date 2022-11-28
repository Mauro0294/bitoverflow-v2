<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();

        $lastPost = Post::whereUser_id($user->id)->orderBy('id', 'desc')->first();

        $postsCount = Post::whereUser_id($user->id)->count();

        return view('profile', ['user' => $user, 'lastPost' => $lastPost, 'postsCount' => $postsCount]);
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
