<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Dislike;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'description',
        'code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('liked', true);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class)->where('liked', false);
    }
}
