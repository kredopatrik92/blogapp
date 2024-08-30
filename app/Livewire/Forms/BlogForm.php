<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogForm extends Form
{

    public $id = null;

    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required')]
    public $description = '';

    public $image;
}
