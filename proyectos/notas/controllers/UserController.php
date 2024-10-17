<?php

require_once 'models/user.php';

class UserController
{
    public function register()
    {
        require_once 'views/login/register.php';
    }

    public function save(){
        if(isset($_POST)){

        }
    }
}
