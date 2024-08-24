<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showTagPost($tag) {
        $posts = Post::whereTag($tag)->get();

        return view('posts', compact('posts', 'tag'));
    }

    public function showYearPost($tag) {
        $postsUser = User::whereSchool_year($tag)->get();

        $posts = [];
        foreach ($postsUser as $postUser) {
            $posts[] = Post::whereUser_id($postUser->id)->get();
        }

        return view('posts', compact('posts', 'tag'));
    }

    public function showAllPosts() {
        $posts = Post::all();

        return view('posts', ['posts' => $posts, 'tag' => 'All']);
    }

    public function showPost($id) {
        $post = Post::whereId($id)->first();
        
        $tag = $post->tag;

        if ($post->tag === 'Laravel') {
            $tag = 'PHP';
        }


        $comments = $post->comments;

        return view('post', compact('post', 'comments', 'tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'code' => 'required',
            'tag' => 'required'
        ]);

        $post = new Post();
        $post->subject = $request->title;
        $post->description = $request->description;
        $post->code = $request->code;
        $post->tag = $request->tag;
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('showPost', ['id' => $post->id]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('showAllPosts');
    }
}
