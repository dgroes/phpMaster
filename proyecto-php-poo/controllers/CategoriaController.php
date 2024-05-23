<?php

require_once 'models/categoria.php';

class CategoriaController
{
    public function index()
    {
        Utils::isAdmin(); //Método static del fichero helpers/utils (Comprobración si hay session de Admin)
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if ($categoria->nombreExiste()) {
                $_SESSION['register-category'] = "duplicate";
            } else {
                $save = $categoria->save();

                if ($save) {
                    $_SESSION['register-category'] = "complete";
                } else {
                    $_SESSION['register-category'] = "failed";
                }
            }
        } else {
            $_SESSION['register-category'] = "failed";
        }

        header("Location:" . base_url . "categoria/index");
    }


    public function delete()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete();

            if ($delete) {
                $_SESSION['delete-category'] = "complete";
            } else {
                $_SESSION['delete-category'] = "failed";
            }
        } else {
            $_SESSION['delete-category'] = "failed";
        }

        header("Location:" . base_url . "categoria/index");
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();

            require_once 'views/categoria/editar.php';
        } else {
            header("Location:" . base_url . "categoria/index");
        }
    }

    public function update()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['nombre'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->setNombre($nombre);

            $update = $categoria->update();

            if ($update) {
                $_SESSION['update-category'] = "complete";
            } else {
                $_SESSION['update-category'] = "falied";
            }
        } else {
            $_SESSION['update-category'] = "falied";
        }

        header("Location:" . base_url . "categoria/index");
    }
}
