<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class StoreComment extends Component
{
    public $post;
    public $description;
    public $code;
    public $tag;
    public $comments;

    public function mount($post)
    {
        $this->post = $post;
        $this->comments = Comment::where('post_id', $this->post->id)->get();
        $this->tag = $this->post->tag;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'description' => 'required|string|max:1000',
            'code' => 'string',
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(), // Assuming user is logged in
            'description' => $this->description,
            'code' => $this->code,
        ]);

        $this->description = '';
        $this->code = '';

        // Refresh the page
        return redirect()->to('/post/' . $this->post->id);
    }

    public function render()
    {
        return view('livewire.comments-section', [
            'comments' => $this->comments,
            'tag' => $this->tag
        ]);
    }
}
