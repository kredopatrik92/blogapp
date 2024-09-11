<?php

namespace App\Livewire\Pages\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $perPage = 4;

    public function getBlogs() {
        return  Blog::query()
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function loadMore()
    {
        $this->reset();
        $this->perPage = $this->perPage + 4;

        return view('livewire.pages.blog.blog-index',[
            'posts' => $this->getBlogs()
        ]);
    }

    public function render()
    {
        return view('livewire.pages.blog.blog-index',[
            'posts' => $this->getBlogs()
        ]);
    }
}
