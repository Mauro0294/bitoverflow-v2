<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();

        $lastPost = Post::whereUser_id($user->id)->orderBy('id', 'desc')->first();

        $postsCount = Post::whereUser_id($user->id)->count();

        // Get the likes that the user has gotten
        // Get the comments of the user
        // Get the likes of the comments
        $comments = Comment::whereUser_id($user->id)->get();
        $likes = 0;
        foreach ($comments as $comment) {
            $likes += $comment->likes()->count();
        }

        $comments = Comment::whereUser_id($user->id)->count();

        return view('profile', ['user' => $user, 'lastPost' => $lastPost, 'postsCount' => $postsCount, 'likes' => $likes, 'comments' => $comments]);
    }
    public function edit(Request $request) {
        $user = Auth::user();

        if ($request->email != $user->email) {
            $request->validate([
                'email' => 'unique:users|email',
            ]); 
            $user->email = $request->email;
        }

        if ($request->school_year != $user->school_year && $request->school_year != null) {
            $request->validate([
                'school_year' => 'integer|min:1|max:3',
            ]);
            $user->school_year = $request->school_year;
        }

        if ($request->biography != null) {
            $user->biography = $request->biography;
        } else {
            $user->biography = "";
        }
        $user->save();
        return back();
    }
}