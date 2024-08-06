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

    public function see()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = new Post();
            $post->setId($id);

            $post = $post->getOne();
        }
        require_once 'views/post/see_post.php';
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
            $post->setSubTitle($_POST['sub_title']);

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

    public function edit()
    {
        Utils::isIdentity();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = new Post();
            $post->setId($id);
            $pos = $post->getOne();
            require_once 'views/post/edit.php';
        } else {
            header("Location:" . base_url . "post/index");
            exit();
        }
    }

    public function update()
    {
        Utils::isIdentity();
        if (isset($_POST) && isset($_POST['id'])) {
            $id = $_POST['id'];
            $title = isset($_POST['title']) ? $_POST['title'] : null;
            $sub_title = isset($_POST['sub_title']) ? $_POST['sub_title'] : null;
            $content = isset($_POST['content']) ? $_POST['content'] : null;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
            $image = isset($_FILES['image']) && $_FILES['image']['size'] > 0 ? $_FILES['image'] : null;

            // Debugging output to check POST data
            // var_dump($_POST);

            $post = new Post();
            $post->setId($id);
            if ($title !== null) $post->setTitle($title);
            if ($sub_title !== null) $post->setSubTitle($sub_title);
            if ($content !== null) $post->setContent($content);
            if ($category_id !== null) $post->setCategoryId($category_id);
            if ($image !== null) {
                $filename = time() . '_' . $image['name'];
                move_uploaded_file($image['tmp_name'], 'uploads/images/' . $filename);
                $post->setImage($filename);
            }

            // Debugging output to check Post object
            // var_dump($post);

            $update = $post->update();

            if ($update) {
                $_SESSION['post-update'] = "complete";
            } else {
                $_SESSION['post-update'] = "failed";
            }
        } else {
            $_SESSION['post-update'] = "failed";
        }
        header("Location:" . base_url . "post/management");
        exit();
    }

    public function delete()
    {
        Utils::isIdentity();
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = new Post();
            $post->setId($id);
            $delete = $post->delete();

            if ($delete) {
                $_SESSION['post-delete'] = "complete";
            } else {
                $_SESSION['post-delete'] = "falied";
            }
        } else {
            $_SESSION['post-delete'] = "falied";
        }
        header("Location:" . base_url . "post/management");
        exit();
    }
}
