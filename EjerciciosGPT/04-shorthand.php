<?php

/**
 * El "short echo tag" o "shorthand" en PHP es una forma abreviada de imprimir 
 * contenido en la página web utilizando la etiqueta <?= en lugar de <?php echo. 
 * Esto es útil para imprimir variables o expresiones simples de una manera más concisa.
 */



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorthand</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>
    <section>
        <h1>Shorthand</h1>

        <!-- 
        ?php: Se utiliza para iniciar un bloque de código PHP estándar. Puedes usarlo para escribir cualquier código PHP válido, como declaraciones de variables, estructuras de control (if, for, while, etc.), funciones, clases, etc.

        ?= expr ?>: Este es el "short echo tag" y se utiliza específicamente para imprimir una expresión directamente en la salida. Es esencialmente una forma abreviada de ?php echo expr; ?>. Debes usar ?= ?> cuando solo quieras imprimir contenido en la salida y no necesites realizar ninguna otra operación dentro del bloque PHP.
         -->
        <hr> <!-- _EJEMPLO -->
        <h2>00: Listar Nombres de un array</h2>
        <?php $nombres = ["Juan", "Diego", "Pablo", "Maximiliano", "Raúl"]; ?>
        <ul>
            <?php foreach ($nombres as $nombre) : ?>
                <li><?= $nombre ?></li>
            <?php endforeach; ?>
        </ul>

        <hr> <!-- _EJERCICIO 1_ -->
        <h2>02: Uno al Diez</h2>
        <p>Escribe un programa que imprima los números del 1 al 10 utilizando el "short echo tag".</p>
        <?php
        $i = 1;
        ?>
        <ul>
            <?php while ($i <= 10) : ?>
                <li><?= $i ?></li>
                <?php $i++; ?>
            <?php endwhile; ?>
        </ul>

        <hr> <!-- _EJERCICIO 2_ -->
        <h2>02: Números pares</h2>
        <p>Desarrolla un programa que solicite al usuario un número y luego imprima todos los números pares desde 2 hasta ese número ingresado utilizando el "short echo tag"</p>
        <form action="04-shorthand.php" method="get">
            <label for="par">Introducir un número</label>
            <input type="number" name="par" placeholder="ejemplo: 23423">
            <input type="submit" value="Imprimir Números Pares">
        </form>
        <?php if (isset($_GET['par'])) :
            $numero = $_GET['par']; // Asignación fuera del short echo tag
        ?>
            <ul>
                <?php for ($p = 2; $p <= $numero; $p += 2) : ?>
                    <li><?= $p; ?></li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>

        <hr> <!-- _EJERCICIO 3_ -->
        <h2>03: Multiplicación</h2>
        <p>
            Crea un programa que solicite al usuario un número y luego imprima la tabla de multiplicar correspondiente a ese número (del 1 al 10) utilizando el "short echo tag".
        </p>
        <form action="04-shorthand.php" method="get">
            <label for="multiplicacion">Introducir número para tabla de multiplicar</label>
            <input type="number" name="multiplicacion" placeholder="Introducir Número">
            <input type="submit" value="Multiplicar">
        </form>
        <?php if(isset($_GET['multiplicacion'])) :
            $mult = $_GET['multiplicacion'];
        ?>
        <ol>
            <?php for ($n = 1; $n <= 10; $n++) : ?>
                <?php $result = $mult * $n; ?>
                <li><?= $result; ?></li>
            <?php endfor;?>
        </ol>
        <?php endif; ?>

    </section>

</body>

</html>


<style>
    body {
        display: flex;
        flex-direction: column;

    }

    h1,
    h2 {
        color: #74ccaa;
    }

    h4 {
        color: #8696d1;
    }

    header {
        text-align: center;

    }

    section {
        margin: auto;
        padding: 0;
        align-content: center;
        margin-left: 20px;
        margin-right: 20px;
    }

    section p {
        color: #ed9cc2;
        text-align: justify;
    }

    section li {
        text-align: justify;
    }
</style>