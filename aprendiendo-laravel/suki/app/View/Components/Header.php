<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $user;

    public function __construct()
    {
       /*  $this->user = auth()->user(); */
    }

    public function render()
    {
        return view('components.header');
    }
}
