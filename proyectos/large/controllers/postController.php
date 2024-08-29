<?php
require_once 'models/post.php';
// require_once 'models/user.php';
class PostController
{
    public function index()
    {
        $post = new Post();
        $allPosts = $post->getAllPosts();

        $mostComments = $post->getPostMostComment();

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

    public function general_management()
    {
        Utils::isAdmin();
        $post = new Post();
        $allPosts = $post->getAllPosts();

        require_once 'views/post/general_management.php';
    }

    public function see()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = new Post();
            $post->setId($id);

            $post = $post->getOne();
            // Obtener los comentarios del post
            $allComments = Utils::showComments();

            // Contar el número de comentarios
            $commentCount = $allComments->num_rows;


            // Obtener el número de likes
            $likeCount = Utils::showLikes(); // Aquí no se necesita num_rows

            // Obtener el número de Dislikes
            $dislikeCount = Utils::showDislikes(); // Aquí no se necesita num_rows
        } else {
            $post = null;
            $allComments = null;
            $commentCount = 0;
            $likeCount = 0;
            $dislikeCount = 0;
        }

        require_once 'views/post/see_post.php';
    }

    public function seeByCategories()
    {
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $post = new Post();
            $allPostsByCategory = $post->getPostsByCategory($category);
        }
        require_once 'views/post/postCategory.php';
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
        header("Location:" . base_url . "post/see&id=$id");
        exit();
    }

    public function delete()
    {
        Utils::isIdentity(); // Verifica si el usuario está logueado

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $post = new Post();
            $post->setId($id);
            $currentPost = $post->getOne(); // Obtén el post actual para verificar el user_id

            // Verifica si el usuario es el creador del post o un administrador
            if ($_SESSION['identity']->id == $currentPost->user_id || isset($_SESSION['admin'])) {
                $delete = $post->delete();

                if ($delete) {
                    $_SESSION['post-delete'] = "complete";
                } else {
                    $_SESSION['post-delete'] = "failed";
                }
            } else {
                $_SESSION['post-delete'] = "failed";
            }
        } else {
            $_SESSION['post-delete'] = "failed";
        }

        header("Location:" . base_url . "post/management");
        exit();
    }


    public function status()
    {
        Utils::isIdentity(); // Verifica si el usuario está logueado

        if (isset($_GET['status']) && isset($_GET['id'])) {
            $status = $_GET['status'];
            $id = $_GET['id'];

            $post = new Post();
            $post->setId($id);
            $currentPost = $post->getOne(); // Obtén el post actual para verificar el user_id

            // Verifica si el usuario es el creador del post o un administrador
            if ($_SESSION['identity']->id == $currentPost->user_id || isset($_SESSION['admin'])) {
                $post->setStatus($status);
                $newStatus = $post->updateStatus();

                if ($newStatus) {
                    $_SESSION['post-status'] = "complete";
                } else {
                    $_SESSION['post-status'] = "failed";
                }
            } else {
                $_SESSION['post-status'] = "failed";
            }
        } else {
            $_SESSION['post-status'] = "failed";
        }

        header("Location:" . base_url . "post/see&id=$id");
        exit();
    }

    public function search()
    {
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            // Guardar la búsqueda en la sesión
            $_SESSION['last_search'] = $_POST['search'];
            // Redirigir para evitar el reenvío del formulario
            header("Location: " . base_url . "post/search?search=" . urlencode($_SESSION['last_search']));
            exit();
        }

        // Verificar si hay una búsqueda almacenada en la sesión o en la URL
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        } elseif (isset($_SESSION['last_search'])) {
            $search = $_SESSION['last_search'];
        } else {
            $search = ''; // No hay búsqueda previa
        }

        // Realizar la búsqueda si hay un término
        if (!empty($search)) {
            $post = new Post();
            $allPosts = $post->getAllPosts($search);
        } else {
            $allPosts = null;
        }

        require_once 'views/post/search.php';
    }
}
