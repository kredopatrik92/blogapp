<?php

namespace App\Livewire\Modals\Blog;

use LivewireUI\Modal\ModalComponent;
use App\Models\Blog;

class DeleteModal extends ModalComponent
{
    public Blog $post;

    public function delete(){
        $this->post->delete();
        $this->closeModal();
        $this->redirect('/blog');
    }

    public function render()
    {
        return view('livewire.modals.blog.delete-modal');
    }
}
