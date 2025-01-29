<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Computo extends Component
{

    public $post_id = 4;

    #[Computed()]
    public function post(){
        return Post::find($this->post_id);
    }

    public function render()
    {
        return view('livewire.computo');
    }
}
