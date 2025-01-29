<?php

namespace App\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $open = true;

    public $paises = [
        'Chile',
        'Perú',
        'Colombia',
        'Argentina',
    ];

    public $pais;
    public $active;
    public $count = 0;

    public function save(){
        array_push($this->paises, $this->pais);
        /* $this->pais = ''; */ //Vaciar los caracteres del input
        $this->reset('pais'); //Vaciar los caracteres del input
    }

    public function delete($index){
        unset($this->paises[$index]);
    }

    public function changeActive($pais){
        $this->active = $pais;
    }

    public function increment(){
        $this->count++;
    }

    public function render()
    {
        return view('livewire.paises');
    }
}
