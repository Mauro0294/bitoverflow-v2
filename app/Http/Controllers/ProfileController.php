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
        if ($lastPost == null) {
            $lastPost = new Post;
            $lastPost->subject = "No posts yet";
        }

        $postsCount = Post::whereUser_id($user->id)->count();

        return view('profile', ['user' => $user, 'lastPost' => $lastPost, 'postsCount' => $postsCount]);
    }
    public function edit(Request $request) {
        $user = Auth::user();

        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'unique:users',
            ]); 
            $user->email = $request->email;
        }

        if ($request->school_year != $user->school_year) {
            $request->validate([
                'school_year' => 'integer|min:1|max:3',
            ]);
            $user->school_year = $request->school_year;
        }

        $user->biography = $request->biography;
        $user->save();
        return back();
    }
}
