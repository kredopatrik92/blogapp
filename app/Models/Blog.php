<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'image', 'votes'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function isVotedByUser($user, $vote)
    {
        return $this->votes()->where([
            'user_id' => $user->id,
            'vote' => $vote
        ])->exists();
    }
}
