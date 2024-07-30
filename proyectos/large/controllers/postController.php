<?php
require_once 'models/post.php';
// require_once 'models/user.php';
class PostController
{
    public function index()
    {

        //Renderizar Vista de los Posts Destacados
        require_once 'views/post/popular.php';
    }

    //Gestión del usuario
    //Gestión = Management
    public function management()
    {
        Utils::isIdentity();
        $user_id = $_SESSION['identity']->id;
        $post = new Post();
        $myPosts = $post->getAllByUser($user_id);
        require_once 'views/post/management.php';
    }

    public function save()
    {
        Utils::isIdentity();
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $post = new Post();
            $post->setUserId($_SESSION['identity']->id); // Asegúrate de tener el id del usuario en la sesión
            $post->setTitle($_POST['title']);
            $post->setContent($_POST['content']);
            $post->setCategoryId($_POST['category_id']);

            if (isset($_FILES['image']) && $_FILES['image']['tmp_name'] != '') {
                // Guardar la imagen
                $file = $_FILES['image'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $post->setImage($filename);
                }
            }

            $save = $post->save();
            if ($save) {
                $_SESSION['register-post'] = "complete";
            } else {
                $_SESSION['register-post'] = "failed";
            }
        } else {
            $_SESSION['register-post'] = "failed";
        }
        header("Location:" . base_url . "post/management");
        exit();
    }
}
