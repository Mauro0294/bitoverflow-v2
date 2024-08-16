<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function showTagPost($tag) {
        $posts = Post::whereTag($tag)->get();

        return view('posts', ['posts' => $posts, 'tag' => $tag]);
    }
    public function showYearPost($tag) {
        $postsUser = User::whereSchool_year($tag)->get();

        $posts = [];
        foreach ($postsUser as $postUser) {
            $posts[] = Post::whereUser_id($postUser->id)->get();
        }

        return view('posts', ['posts' => $posts, 'tag' => $tag]);
    }
    public function showAllPosts() {
        $posts = Post::all();

        return view('posts', ['posts' => $posts, 'tag' => 'All']);
    }
    public function showPost($id) {
        $post = Post::whereId($id)->first();
        $comments = $post->comments;

        return view('post', ['post' => $post, 'comments' => $comments]);
    }
}
