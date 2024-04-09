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
        <hr>
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