<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOR</title>
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>
    <header>
        <h1>Reforzamiento de bucles en PHP!</h1>

    </header>
    <section>

        <h2>FOR</h2>

        <!-- _EJERCICIO 1_ -->
        <hr>
        <h4>Ejercicio 1:</h4>
        <p>
            Escribe un programa que imprima los números del 1 al 10.
        </p>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo $i . " / ";
        }
        ?>

        <!-- _EJERCICIO 2_ -->
        <hr>
        <h4>Ejercicio 2:</h4>
        <p>
            Desarrolla un programa que imprima los números pares del 2 al 20.
        </p>
        <?php
        for ($p = 2; $p <= 20; $p += 2) {
            echo $p . " / ";
        }
        ?>

        <!-- _EJERCICIO 3_ -->
        <hr>
        <h4>Ejercicio 3:</h4>
        <p>
            Crea un programa que solicite al usuario un número y luego imprima todos los números desde 1 hasta ese número ingresado.
        </p>
        <form action="03-for.php" method="GET">
            <label for="numero">Ingresar Número</label>
            <input type="number" name="numero">
            <input type="submit" value="Enviar Número😀">
        </form>
        <?php
        if (isset($_GET['numero'])) {
            $numero = $_GET['numero'];
            for ($e = 1; $e <= $numero; $e++) {
                echo $e . " / ";
            }
        }

        ?>

        <!-- _EJERCICIO 4_ -->
        <hr>
        <h4>Ejercicio 4:</h4>
        <p>
            Escribe un programa que solicite al usuario un número y luego imprima la tabla de multiplicar correspondiente a ese número (del 1 al 10).
        </p>
        <form action="03-for.php" method="GET">
            <label for="num">Ingresar Número a Multiplicar</label>
            <input type="number" name="num">
            <input type="submit" value="Enviar Número🚀">
        </form>
        <?php
        if (isset($_GET['num'])) {
            $num = $_GET['num'];
            for ($w = 1; $w <= 10; $w++) {
                $mult = $num * $w;
                echo $mult . " / ";
            }
        }

        ?>

        <!-- _EJERCICIO 5_ -->
        <hr>
        <h4>Ejercicio 5:</h4>
        <p>
            Desarrolla un programa que calcule e imprima la suma de los primeros N números naturales, donde N es un número ingresado por el usuario.
        </p>
        <form action="03-for.php" method="GET">
            <label for="natural">Ingresar Número Natural</label>
            <input type="number" name="natural">
            <input type="submit" value="Enviar Número🐄">
        </form>
        <?php
        if (isset($_GET['natural'])) {
            $natural = $_GET['natural'];
            $suma = 0; //Si dejará $suma dentro del bucle se establecería en cada iteración que el valor de $suma es 0, por lo que no funcionaría el bucle.
            for ($contador = 1; $contador <= $natural; $contador++) {

                $suma += $contador;
            }
            echo "La suma de todos los números desde 1 hasta $natural es: $suma";
        }

        ?>

        <!-- _EJERCICIO 6_ -->
        <hr>
        <h4>Ejercicio 6:</h4>
        <p>
            Crea un programa que imprima los primeros N términos de la secuencia de Fibonacci, donde N es un número ingresado por el usuario.
        </p>
        <form action="03-for.php" method="GET">
            <label for="tope">Ingresar Número Para Imprimir La Sucesión</label>
            <input type="number" name="tope">
            <input type="submit" value="Enviar Número🐸">
        </form>
        <?php
        if (isset($_GET['tope'])) {
            $number = $_GET['tope'];
            $a = 0;
            $b = 1;
            echo $a . " / ";
            echo $b . " / ";
            for ($i = 2; $i < $number;) {
                $temp = $a + $b;
                echo $temp . " / ";
                $a = $b;
                $b = $temp;
                $i++;
            }
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