<?php

require_once 'models/category.php';

class CategoryController
{
    public function index()
    {
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }
}
