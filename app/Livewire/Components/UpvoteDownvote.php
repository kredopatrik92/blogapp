<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class UpvoteDownvote extends Component
{
    public $totalCount = 0;
    public $isVotedUp = false;
    public $isVotedDown = false;

    public Model $model;

    public function mount()
    {
        $this->totalCount = $this->model->votes()->sum('vote');

        if(Auth::check()){
            $this->isVotedUp = $this->model->isVotedByUser(auth()->user(), 1) ? true : false;
            $this->isVotedDown = $this->model->isVotedByUser(auth()->user(), -1) ? true : false;
        }
    }

    public function render()
    {
        return view('livewire.components.upvote-downvote');
    }

    public function upVote()
    {
        //undo upvote
        if($this->model->isVotedByUser(auth()->user(), 1)){
            $this->deleteVote(1);
            $this->setVoteCountVariable();

            $this->isVotedUp = false;

            return;
        }else{
            $this->storeVote(1);
            $this->isVotedUp = true;

            //Remove downVote (if already downvoted)
            $this->deleteVote(-1);
            $this->isVotedDown = false;

            $this->setVoteCountVariable();

            return;
        }
    }

    public function downVote()
    {
        //undo upvote
        if($this->model->isVotedByUser(auth()->user(), -1)){
            $this->deleteVote(-1);
            $this->setVoteCountVariable();

            $this->isVotedDown = false;

            return;
        }else{
            $this->storeVote(-1);
            $this->isVotedDown = true;

            //Remove downVote (if already upvoted)
            $this->deleteVote(1);
            $this->isVotedUp = false;

            $this->setVoteCountVariable();

            return;
        }
    }

    public function deleteVote($value)
    {
        $this->model->votes()
            ->where([
                'user_id' => auth()->user()->id,
                'vote' => $value
            ])
            ->delete();
    }

    public function storeVote($value)
    {
        $this->model->votes()->create([
            'user_id' => auth()->user()->id,
            'vote' => $value
        ]);
    }

    public function setVoteCountVariable()
    {
        $this->model->refresh();

        $this->totalCount = $this->model->votes()->sum('vote');
    }
}
