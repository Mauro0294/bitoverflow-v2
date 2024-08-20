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

        $topUsers = $this->getTopUsers();
        $topUsersColors = ['#22C55E', '#EAB308', '#EA580C'];

        return view('profile', ['user' => $user, 'lastPost' => $lastPost, 'postsCount' => $postsCount, 'likes' => $likes, 'comments' => $comments, 'topUsers' => $topUsers, 'topUsersColors' => $topUsersColors]);
    }

    public function getTopUsers()
    {
        // Get the top 3 users with the most likes
        $users = \DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->join('likes', function($join) {
                $join->on('comments.id', '=', 'likes.comment_id')
                    ->where('likes.liked', '=', 1);
            })
            ->select('users.id', 'users.first_name', 'users.last_name', \DB::raw('count(likes.id) as likes'))
            ->groupBy('users.id', 'users.first_name', 'users.last_name')
            ->orderBy('likes', 'desc')
            ->limit(3)
            ->get();

        return $users;
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