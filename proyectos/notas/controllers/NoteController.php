<?php
require_once 'models/note.php';

class NoteController
{
    public function index()
    {
        require_once 'views/note/notes.php';
    }
}
