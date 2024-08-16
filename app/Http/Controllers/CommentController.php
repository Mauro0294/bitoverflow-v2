<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Dislike;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'code' => 'required',
            'post_id' => 'required'
        ]);

        $comment = new Comment();
        $comment->description = $request->description;
        $comment->code = $request->code;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    public function like($id)
    {
        $comment = Comment::find($id);

        if ($comment->likes()->where('user_id', Auth::user()->id)->exists()) {
            $comment->likes()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        }

        if ($comment->dislikes()->where('user_id', Auth::user()->id)->exists()) {
            $comment->dislikes()->where('user_id', Auth::user()->id)->delete();
        }

        Like::create([
            'user_id' => Auth::user()->id,
            'post_id' => $comment->post->id,
            'comment_id' => $comment->id,
            'liked' => true
        ]);

        return redirect()->back();
    }

    public function dislike($id)
    {
        $comment = Comment::find($id);

        if ($comment->dislikes()->where('user_id', Auth::user()->id)->exists()) {
            $comment->dislikes()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        }

        if ($comment->likes()->where('user_id', Auth::user()->id)->exists()) {
            $comment->likes()->where('user_id', Auth::user()->id)->delete();
        }

        Dislike::create([
            'user_id' => Auth::user()->id,
            'post_id' => $comment->post->id,
            'comment_id' => $comment->id,
            'liked' => false
        ]);

        return redirect()->back();
    }
}
