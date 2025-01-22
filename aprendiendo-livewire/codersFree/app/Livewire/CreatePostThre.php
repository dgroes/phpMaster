<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePostThre extends Component
{
    // public $title = "Hola mundo";
    public $title;
    public $name, $email;

    public function mount(User $user){
        //Extraer datos de manera individual
        // $this->name = $user->name;
        // $this->email = $user->email;

        //Extraer datos de manera masiva
        $this->fill(
            $user->only(['name', 'email'])
        );
    }

    public function save(){
        // dd($this->name);
    }


    public function render()
    {
        return view('livewire.create-post-thre');
    }
}
