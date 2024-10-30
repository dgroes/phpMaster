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
        } else {
            require_once 'views/note/bienvenido.php';
        }
        require_once 'views/note/notes.php';
    }

    public function seeNotes() {}

    public function create(){
        Utils::isIdentity();
        $user_id = $_SESSION['identity']->id;
        $note = new Note();
        require_once 'views/note/create.php';
    }
}
