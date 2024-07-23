<?php

require_once 'models/category.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    /*  public function create()
    {
        Utils::isAdmin();
        require_once 'views/category/create.php';
    } */

    public function save()
    {
        Utils::isAdmin();

        //Guardar la categoría a la BD
        if (isset($_POST) && isset($_POST['name'])) {
            $category = new Category();
            $category->setName($_POST['name']);
            $save = $category->save();
        }
        header("Location:" . base_url . "category/index");
    }

    public function delete()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            $delete = $category->delete();

            //Mensajes de alerta
        }

        header("Location:" . base_url . "category/index");
    }

    public function edit()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            $cat = $category->getOne();
            require_once 'views/category/edit.php';
        } else {
            header("Location:" . base_url . "category/index");
        }
    }

    public function update()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['name'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $category = new Category();
            $category->setId($id);
            $category->setName($name);

            $update = $category->update();

            // Mensajes de alerta
            if ($update) {
                $_SESSION['update'] = "complete";
            } else {
                $_SESSION['update'] = "failed";
            }
        } else {
            echo "No hay datos para actualizar.";
        }

        header("Location:" . base_url . "category/index");
        exit();
    }
}
