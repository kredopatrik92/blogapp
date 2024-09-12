<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Reactive;

class UpvoteDownvote extends Component
{
    public $totalViewCount = 0;

    public $totalVoteCount = 0;
    public $isVoted = false;

    public Model $model;

    public function mount()
    {
        $this->totalVoteCount = $this->model->votes()->count();
        $this->totalViewCount = $this->model->views()->count();
        if(Auth::check()){
            $this->isVoted = $this->model->isVotedByUser(auth()->user()) ? true : false;
        }
    }

    public function render()
    {
        return view('livewire.components.upvote-downvote');
    }

    public function toggleVote()
    {
        if($this->model->isVotedByUser(auth()->user())){
            $this->deleteVote();
            $this->isVoted = false;
        }else{
            $this->storeVote();
            $this->isVoted = true;
        }

        $this->setVoteCountVariable();
    }


    public function deleteVote()
    {
        $this->model->votes()
            ->where([
                'user_id' => auth()->user()->id
            ])
            ->delete();
    }

    public function storeVote()
    {
        $this->model->votes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function setVoteCountVariable()
    {
        $this->model->refresh();
        $this->totalVoteCount = $this->model->votes()->count();
    }
}
