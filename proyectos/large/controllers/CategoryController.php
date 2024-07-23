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

        // Guardar la categoría a la BD
        if (isset($_POST) && isset($_POST['name']) && !empty($_POST['name'])) {
            $category = new Category();
            $category->setName($_POST['name']);

            if ($category->nameExists()) {
                $_SESSION['register-category'] = "duplicate"; // Mensaje de alerta
            } else {
                $save = $category->save();

                // Mensajes de alerta
                if ($save) {
                    $_SESSION['register-category'] = "complete";
                } else {
                    $_SESSION['register-category'] = "failed_save";
                }
            }
        } else {
            $_SESSION['register-category'] = "empty_name";
        }

        header("Location:" . base_url . "category/index");
        exit();
    }


    public function delete()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            $delete = $category->delete();

            // Mensajes de alerta
            if ($delete) {
                $_SESSION['delete-category'] = "complete";
            } else {
                $_SESSION['delete-category'] = "falied_delete";
            }
        } else {
            $_SESSION['delete-category'] = "falied";
        }

        header("Location:" . base_url . "category/index");
        exit();
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
            exit();
        }
    }

    public function update()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['name']) && !empty($_POST['name'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $category = new Category();
            $category->setId($id);
            $category->setName($name);

            if ($category->nameExists()) {
                $_SESSION['update-category'] = "duplicate";
            } else {
                $update = $category->update();

                // Mensajes de alerta
                if ($update) {
                    $_SESSION['update-category'] = "complete";
                } else {
                    $_SESSION['update-category'] = "failed";
                }
            }
        } else {
            $_SESSION['update-category'] = "failed";
        }

        header("Location:" . base_url . "category/index");
        exit();
    }
}
