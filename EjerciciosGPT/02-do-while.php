<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do While</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />

</head>

<body>

    <section>
        <p>
            En PHP, como en otros lenguajes de programación, los bucles son estructuras de control que permiten ejecutar un bloque de código repetidamente mientras se cumpla una condición específica. Los bucles son una forma eficiente de realizar tareas repetitivas sin tener que escribir el mismo código una y otra vez.
        </p>

        <h2>DO WHILE</h2>
        <p>
            Los bucles do-while son muy similares a los bucles while, excepto que la expresión verdadera es verificada al final de cada iteración en lugar que al principio. La diferencia principal con los bucles while es que está garantizado que corra la primera iteración de un bucle do-while (la expresión verdadera sólo es verificada al final de la iteración), mientras que no necesariamente va a correr con un bucle while regular (la expresión verdadera es verificada al principio de cada iteración, si se evalúa como false justo desde el comienzo, la ejecución del bucle terminaría inmediatamente).
        </p>

        <hr>
        <h2>Fácil</h2>
        <h4>Ejercicio 1: Fácil</h4>
        <p>
            Escribe un programa que imprima los números del 1 al 10 utilizando un bucle do-while.
        </p>
        <?php
        $i = 1;
        do {
            echo $i . " / ";
            $i++;
        } while ($i <= 10);
        ?>


        <h4>Ejercicio 2: Fácil</h4>
        <p>
            Desarrolla un programa que solicite al usuario un número y luego imprima todos los números desde 1 hasta ese número ingresado utilizando un bucle do-while.
        </p>
        <form action="02-do-while.php" method="GET">
            <label for="do">Introducir un número</label>
            <input type="number" name="do" placeholder="Introduzca un número">
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_GET['do'])) {
            $num = $_GET['do'];
            $q = 1;
            do {
                echo $q . " / ";
                $q++;
            } while ($q <= $num);
        }
        ?>
        <br>

        <h4>Ejercicio 3: Fácil</h4>
        <p>
            Escribe un programa que solicite al usuario un número y luego imprima la tabla de multiplicar correspondiente a ese número (del 1 al 10) utilizando un bucle do-while.
        </p>
        <form action="02-do-while.php" method="GET">
            <label for="multi">Introducir un número</label>
            <input type="number" name="multi" placeholder="Introduzca un número">
            <input type="submit" value="Enviar">
        </form>
        <?php
        if (isset($_GET['multi'])) {
            $mult = $_GET['multi'];
            $q = 1;
            do {
                echo $q * $mult . " / ";
                $q++;
            } while ($q <= 10);
        }

        ?>
        <br>

        <h4>Ejercicio 4: Fácil</h4>
        <p>
            Desarrolla un programa que solicite al usuario una contraseña y la valide. El programa debe seguir solicitando la contraseña hasta que el usuario ingrese la contraseña correcta. Utiliza un bucle do-while.
        </p>
        <?php
        if (isset($_GET['password']) && isset($_GET['passwordValidate'])) {
            $password = $_GET['password'];
            $passwordValidate = $_GET['passwordValidate'];

            do {
                if ($password != $passwordValidate) {
                    echo "Las contraseñas deben ser iguales. <br>";
                    // Solicitar nuevamente las contraseñas al usuario
        ?>
                    <form action="02-do-while.php" method="GET">
                        <label for="password">Introducir contraseña</label>
                        <input type="password" name="password" placeholder="Contraseña">
                        <label for="passwordValidate">Introducir nuevamente la contraseña</label>
                        <input type="password" name="passwordValidate" placeholder="Contraseña">
                        <input type="submit" value="Crear Contraseña">
                    </form>
        <?php
                    exit; // Salir del script después de imprimir el mensaje de error
                }
            } while ($password != $passwordValidate);

            echo "Contraseña Validada";
        } else {
            echo "Introducir una contraseña valida";
        }
        ?>

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