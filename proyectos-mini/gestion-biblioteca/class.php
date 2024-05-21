<?php

class Database
{

    public static function conectar()
    {
        $conexion = new mysqli("localhost", "root", "", "mini_biblioteca");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}

class Libro
{
    public $titulo;
    public $autor;
    public $genero;
    public $disponible;

    public function __construct($titulo, $autor, $genero)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->disponible = true;
    }

    // Métodos para obtener y cambiar el estado de disponibilidad del libro
}

class Usuario
{
    public $nombre;
    public $apellido;
    public $librosPrestados = [];

    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    // Métodos para prestar y devolver libros
}

class Biblioteca
{
    public $libros = [];


    public function agregarLibro($libro)
    {
        // Agregar un libro a la lista de libros de la biblioteca
        $conexion = Database::conectar();
        $query = "INSERT INTO libros (titulo, autor, genero, disponible) VALUES (?, ?, ?, ?)";
        $statement = $conexion->prepare($query);
        $statement->bind_param("sssi", $libro->titulo, $libro->autor, $libro->genero, $libro->disponible);
        $statement->execute();
        $statement->close();
        $conexion->close();
    }

    public function mostrarLibrosDisponibles()
    {
        $conexion = Database::conectar();
        $query = "SELECT * FROM libros WHERE disponible = TRUE";
        $result = $conexion->query($query);

        $libros = [];
        while ($row = $result->fetch_assoc()) {
            $libro = new Libro($row['titulo'], $row['autor'], $row['genero']);
            $libro->disponible = $row['disponible'];
            $libros[] = $libro;
        }

        $conexion->close();
        return $libros;
    }

    public function buscarLibros($titulo, $autor)
    {
        // Buscar libros por título o autor y mostrar los resultados
        
    }

    public function prestarLibro($libro, $usuario)
    {
        // Permitir a un usuario prestar un libro
    }

    public function devolverLibro($libro, $usuario)
    {
        // Permitir a un usuario devolver un libro prestado
    }
}
