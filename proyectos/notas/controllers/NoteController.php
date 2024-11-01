<?php
require_once 'models/note.php';

class NoteController
{
    public function index()
    {
        if (isset($_SESSION['identity'])) {
            $user_id = $_SESSION['identity']->id;
            $note = new Note();
            $myNotes = $note->getAllByUser($user_id);

            require_once 'views/note/notes.php';
        } else {
            require_once 'views/note/bienvenido.php';
        }
    }

    public function create()
    {
        Utils::isIdentity();
        $user_id = $_SESSION['identity']->id;
        $note = new Note();
        require_once 'views/note/create.php';
    }

    public function save()
    {
        Utils::isIdentity();
        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['user_id'])) {
            $note = new Note();
            $note->setUserId($_POST['user_id']);
            $note->setTitle($_POST['title']);
            $note->setContent($_POST['content']);
            $note->setColorId($_POST['color_id']);

            $save = $note->save();
            if ($save) {
                $_SESSION['register-note'] = "complete";
            } else {
                $_SESSION['register-note'] = "falied";
            }
        } else {
            $_SESSION['register-note'] = "falied";
        }
        header("Location:" . base_url . "note/index");
        exit();
    }

    public function see()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $note = new Note();
            $note->setId($id);
            
            $note = $note->getOne();
        }
        require_once 'views/note/see.php';
    }
}
