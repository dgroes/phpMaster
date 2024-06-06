<?php

class PostController{
    public function index(){

        //Renderizar Vista de los Posts Destacados
        require_once 'views/post/popular.php';
    }
}