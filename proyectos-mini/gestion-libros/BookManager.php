<?php
require_once 'config.php';
require_once 'Book.php';

class BookManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getDatabaseConnection();
    }

    public function addBook(){
        if(isset($_POST)){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publicationYear = $_POST['publicationYear'];
            $genre = $_POST['genre'];
    

            $book = new Book($title, $author, $publicationYear, $genre);
            $book->addBook();

        }
    }
}
