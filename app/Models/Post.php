<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
         return $this->hasMany(Comment::class);
    }

    public function likes()
    {
         return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->user()->id,
        ], [
            'liked' => $liked
        ]);
    }
    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        // return $this->likes()->where('user_id', $user->id)->exists();
        return (bool) $user->likes()->where('post_id', $this->id)->where('liked', true)->count();
    }

    public function scopeWithLikes(Builder $query) {

        $query->leftJoinSub('select post_id, sum(liked) likes, sum(liked) dislikes from likes group by post_id',
                'likes',
                'likes.post_id', 'posts.id'
            );
    }

}
