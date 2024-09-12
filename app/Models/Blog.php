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

    public function views(){
        return $this->morphMany(View::class, 'viewable');
    }

    public function isVotedByUser($user)
    {
        return $this->votes()->where([
            'user_id' => $user->id
        ])->exists();
    }

    public function isViewedByUser($user)
    {
        return $this->views()->where([
            'user_id' => $user->id
        ])->exists();
    }
}
