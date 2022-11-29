<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function showTagPost($tag) {
        $posts = Post::whereTag($tag)->get();
        $users = User::whereIn('id', $posts->pluck('user_id'))->get();

        return view('posts', ['posts' => $posts, 'tag' => $tag, 'users' => $users]);
    }
}
