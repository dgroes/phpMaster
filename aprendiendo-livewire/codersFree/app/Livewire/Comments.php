<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{

    public $comments = [];

    #[On('post-created')] // Escucha el evento post-created que está en Formulario.php
    public function addComment($comment){
        array_unshift($this->comments, $comment);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
