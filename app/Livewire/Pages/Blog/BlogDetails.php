<?php

namespace App\Livewire\Pages\Blog;

use Livewire\Component;
use App\Models\Blog;

class BlogDetails extends Component
{
    public Blog $post;

    public function mount()
    {
        if(!$this->post->isViewedByUser(auth()->user())){
            $this->markAsViewed();
        }
    }

    public function render()
    {
        return view('livewire.pages.blog.blog-details');
    }

    public function markAsViewed()
    {
        $this->post->views()->create([
            'user_id' => auth()->user()->id
        ]);
    }
}
