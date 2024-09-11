<?php

namespace App\Livewire\Pages\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Forms\BlogForm;

class BlogAddEdit extends Component
{
    use WithFileUploads;

    public BlogForm $form;
    public $image;
    public Blog $post;

    public function save()
    {
        $this->validate();

        if(isset($this->form->image))
            $image = $this->form->image->store('public/posts');
        else
            $image = $this->post->image;

        Blog::query()->updateOrCreate(
            ['id' => $this->form->id],
            [
                'user_id' => auth()->user()->id,
                'title' => $this->form->title,
                'description' => $this->form->description,
                'image' => $image
            ]
        );

        if(isset($this->post))
            $this->redirect('/blog/'. $this->post->id);
        else
            $this->redirect('/blog');
    }

    public function render()
    {
        if(isset($this->post))
        {
            $this->form->id = $this->post->id;
            $this->form->title = $this->post->title;
            $this->form->description = $this->post->description;
            $this->image = Storage::url($this->post->image);
        }
        return view('livewire.pages.blog.blog-add-edit');
    }
}
