<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentMessage extends Component
{
    public $comment;
    public $model;

    public function mount($comment, $model)
    {
        $this->comment = $comment;
        $this->model = $model;
    }

    public function render()
    {
        return view('livewire.comment-message');
    }
}
