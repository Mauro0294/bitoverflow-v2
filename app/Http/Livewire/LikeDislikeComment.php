<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeDislikeComment extends Component
{
    public $comment;
    public $liked = false;
    public $disliked = false;

    public function mount($comment)
    {
        $this->comment = $comment;
        $this->liked = $this->comment->likes()
                            ->where('liked', true)
                            ->where('user_id', Auth::id())
                            ->exists();
        $this->disliked = $this->comment->likes()
                            ->where('liked', false)
                            ->where('user_id', Auth::id())
                            ->exists();
    }

    public function toggleLike()
    {
        if ($this->liked) {
            $this->comment->likes()->where('user_id', Auth::id())->delete();
            $this->liked = false;
        } else {
            // Remove dislike if present
            $this->comment->likes()->where('user_id', Auth::id())->where('liked', false)->delete();
            
            // Add or update like
            Like::updateOrCreate(
                ['user_id' => Auth::id(), 'comment_id' => $this->comment->id],
                ['liked' => true, 'post_id' => $this->comment->post->id]
            );
            $this->liked = true;
        }

        // Refresh state
        $this->disliked = $this->comment->likes()->where('liked', false)->where('user_id', Auth::id())->exists();
    }

    public function toggleDislike()
    {
        // Remove dislike if it’s currently disliked
        if ($this->disliked) {
            $this->comment->dislikes()->where('user_id', Auth::id())->where('liked', false)->delete();
            $this->disliked = false;
        } else {
            // Remove like if present
            $this->comment->likes()->where('user_id', Auth::id())->where('liked', true)->delete();
            
            // Add or update dislike
            Like::updateOrCreate(
                ['user_id' => Auth::id(), 'comment_id' => $this->comment->id],
                ['liked' => false, 'post_id' => $this->comment->post->id]
            );
            $this->disliked = true;
        }

        // Refresh state
        $this->liked = $this->comment->likes()->where('liked', true)->where('user_id', Auth::id())->exists();
    }

    public function render()
    {
        $likes = $this->comment->likes()->where('liked', true)->count();
        $dislikes = $this->comment->dislikes()->where('liked', false)->count();
        $likeCount = $likes - $dislikes;
        
        return view('livewire.like-dislike-comment', [
            'likeCount' => $likeCount,
        ]);
    }
}
