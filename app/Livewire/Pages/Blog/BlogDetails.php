<?php

namespace App\Livewire\Pages\Blog;

use Livewire\Component;
use App\Models\Blog;

class BlogDetails extends Component
{
    public Blog $post;

    public function render()
    {
        return view('livewire.pages.blog.blog-details');
    }
}
