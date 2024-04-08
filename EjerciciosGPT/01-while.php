<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WHILE</title>
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>
    <header>
        <h1>Reforzamiento de bucles en PHP!</h1>

    </header>
    <section>
        <p>
            En PHP, como en otros lenguajes de programación, los bucles son estructuras de control que permiten ejecutar un bloque de código repetidamente mientras se cumpla una condición específica. Los bucles son una forma eficiente de realizar tareas repetitivas sin tener que escribir el mismo código una y otra vez.
        </p>

        <h2>WHILE</h2>
        <p>
            El bucle while es una estructura de control en PHP que permite ejecutar un bloque de código mientras se cumpla una condición específica.
        </p>
        <p>
            La condición se evalúa antes de cada iteración del bucle. Si la condición es verdadera (true), el bloque de código dentro del bucle se ejecuta. Después de cada iteración, la condición se vuelve a evaluar. Si la condición sigue siendo verdadera, el bucle continúa ejecutándose. El bucle se detiene cuando la condición se evalúa como falsa (false).F
        </p>

        <hr>
        <h2>Medio</h2>
        <h4>Ejercicio 1: Medio</h4>
        <p>
            Escribe un programa que solicite al usuario un número y luego determine si es un número primo o no.
        </p>
        <form action="01-while.php" method="GET">
            <label for="primo">Introducir número</label>
            <input type="number" placeholder="Introducir Número para saber si es número primo o no">
            <input type="submit" value="¿Primo o No?">
        </form>
        <?php
        if (isset($_GET['primo'])) {

            $primo = $_GET['primo'];

            while ($i == 0) {
                $i = $primo;
                $primo % $i;
                $i--;
            }
            /* if (){
                echo "Es primo";
            } else {
                echo "No es primo";
            } */
        }

        ?>

        <h4>Ejercicio 2: Medio</h4>
        <p>
            Desarrolla un programa que genere la secuencia de Fibonacci hasta un número ingresado por el usuario.
        </p>
        <form action="01-while.php" method="GET">
            <label for="fibo">Introducir número</label>
            <input type="number" id="fibo" name="fibo" placeholder="Introducir número">
            <input type="submit" value="Fibonacci">
        </form>
        <?php
        if (isset($_GET['fibo'])) {
            $fibo = $_GET['fibo'];
            $a = 0;
            $b = 1;
            echo $a . " / ";
            echo $b . " / ";
            while ($b <= $fibo) {
                $temp = $a + $b;
                echo $temp . " / ";
                $a = $b;
                $b = $temp;
            }
        }



        ?>


        <hr>
        <h2>Fácil</h2>
        <h4>Ejercicio 1: Fácil</h4>
        <p>Ejecutar todos los números del 0 al 100</p>
        <?php
        $numero = 0;
        while ($numero <= 100) {
            echo $numero . " / ";
            $numero++;
        }

        ?>
        <br>

        <h4>Ejercicio 2: Fácil</h4>
        <p>
            Escribe un programa que genere una secuencia de números pares del 2 al 20 utilizando un bucle while. Cada número de la secuencia debe imprimirse en una nueva línea.
        </p>
        <?php
        $numero = 2;
        while ($numero <= 20) {
            echo $numero . " / ";
            $numero = $numero + 2;
        }

        ?>
        <br>

        <h4>Ejercicio 3: Fácil</h4>
        <p>
            Desarrolla un programa que solicite al usuario un número y luego imprima todos los números desde 1 hasta ese número ingresado.
        </p>
        <form action="01-while.php" method="get">
            <label for="numero">Introducir un número</label>
            <input type="number" name="numeroRecibido" id="numero">
            <input type="submit" value="Enviar">
        </form>
        <?php
        $num = 0;
        if (isset($_GET['numeroRecibido'])) {
            $numeroR = $_GET['numeroRecibido'];
            while ($num <= $numeroR) {
                echo $num . " / ";
                $num++;
            }
        } else {
            echo "Por Favor Introducir un número.";
        }
        ?>

        <br>

        <h4>Ejercicio 4: Fácil</h4>
        <p>
            Escribe un programa que pida al usuario un número y luego imprima la tabla de multiplicar correspondiente a ese número (del 1 al 10).
        </p>
        <form action="01-while.php">
            <label for="tabla">Introducir número para la tabla de multiplicar</label>
            <input type="number" name="tabla" placeholder="Introducir un número">
            <input type="submit" value="Generar Tabla">
        </form>
        <?php
        if (isset($_GET['tabla'])) {
            $tabla = $_GET['tabla'];
            $inicial = 1;
            while ($inicial <= 10) {
                $resultado = $tabla * $inicial;
                echo $resultado . " / ";
                $inicial++;
            }
        }

        ?>

        <br>

        <h4>Ejercicio 5: Fácil</h4>
        <p>
            Crea un programa que solicite al usuario un número y luego imprima la suma de todos los números desde 1 hasta ese número ingresado.
        </p>
        <form action="01-while.php">
            <label for="suma">Introducir número para sumar</label>
            <input type="number" name="suma" placeholder="Introducir un número">
            <input type="submit" value="Calcular Suma">
        </form>
        <?php
        if (isset($_GET['suma'])) {
            $numero = $_GET['suma'];
            $suma = 0;
            $contador = 1;
            while ($contador <= $numero) {
                $suma += $contador;
                $contador++;
            }
            echo "La suma de todos los números desde 1 hasta $numero es: $suma";
        }
        ?>


    </section>



</body>

<?php




?>

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