<?php

namespace App\Livewire;

use Livewire\Component;

class Father extends Component
{
    public $name = "Diego";
    public function render()
    {
        return view('livewire.father');
    }

    public function redirigir()
    {
        return $this->redirect('/prueba', navigate: true);
    }
}
