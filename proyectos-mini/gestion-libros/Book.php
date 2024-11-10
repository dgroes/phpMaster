<?php

//Para que tenga tipado estricto
declare(strict_types=1);

//Clase/Modelo de Book
class Book
{
    private int $id;
    private string $title;
    private string $author;
    private int $publicationYear;
    private array $genre;

    public function __construct(string $title, string $author, int $publicationYear, array $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->genre = $genre;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getPublicationYear(): int
    {
        return $this->publicationYear;
    }

    public function getGenre(): array
    {
        return $this->genre;
    }

    // Setters
    public function setTitle(int $title)
    {
        $this->title = $title;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    public function setPublicationYear(int $year)
    {
        $this->publicationYear = $year;
    }

    public function setGenre(array $genre)
    {
        $this->genre = $genre;
    }

    public function addBook(){
        
    }
}
