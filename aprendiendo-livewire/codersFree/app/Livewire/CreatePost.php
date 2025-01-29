<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    public function render()
    {
        // Retornar una view
        // return view('livewire.create-post');

        // Retornar un componente inline
        return <<<'HTML'
        <div>
            <h1>
                Hola este es un componente Inline de Livewire
            </h1>
        </div>
        HTML;
    }
}
