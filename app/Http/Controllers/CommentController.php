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
        $comment->user_id = Auth::id();
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
}
