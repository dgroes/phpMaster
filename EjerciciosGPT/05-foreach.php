<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Ejercicios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <main class="container-fluid">

        <h4>1: Suma de valores</h4>
        <p>Dado un array de números, calcula la suma de todos los valores</p>
        <code>$numeros = [1, 2, 3, 4, 5];</code>
        <br>
        <?php
        $numeros = [1, 2, 3, 4, 5];
        $sumaArray = array_sum($numeros);
        ?>
        <label for="">Resultado</label>
        <input type="text" name="text" value="<?= $sumaArray ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>2: Nombre en mayúsculas</h4>
        <p>Dado un array de nombres, convierte todos los nombres a mayúsculas y almacénalos en un nuevo array.</p>
        <code>$nombres = ['juan', 'maria', 'pedro', 'ana'];</code>
        <?php
        $nombres = ['juan', 'maria', 'pedro', 'ana'];

        $separar = implode(",", $nombres);
        $mayusculas = strtoupper($separar);
        $nombresMayusculas = explode(",", $mayusculas);
        ?>
        <label for="">Resultado</label>
        <input type="text" name="text" value="<?= print_r($nombresMayusculas) ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>3: Filtrar valores pares</h4>
        <p>Dado un array de números, crea un nuevo array que solo contenga los números pares.</p>
        <code>$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];</code>
        <?php
        $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        foreach ($numeros as $pares) {
            if ($pares % 2 == 0) {
                $nuevoArray[] = $pares;
            }
        }

        ?>
        <label for="">Resultado</label>
        <input type="text" name="text" value="<?= print_r($nuevoArray); ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>4: Contar palabras</h4>
        <p>Dado un array de palabras, cuenta cuántas veces aparece cada palabra en el array.</p>
        <code>$palabras = ['manzana', 'banana', 'manzana', 'cereza', 'banana', 'cereza', 'cereza'];</code>
        <?php
        $palabras = ['manzana', 'banana', 'manzana', 'cereza', 'banana', 'cereza', 'cereza'];
        $contadorPalabras = array_count_values($palabras);
        print_r($contadorPalabras);
        ?>
        <input type="text" name="text" value="<?= print_r($contadorPalabras); ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>5: Nombres y edades</h4>
        <p>
            Dado un array asociativo de nombres y edades, imprime los nombres de las personas que tienen más de 18 años.
        </p>
        <code>
            $personas = [
            'Juan' => 15,
            'María' => 20,
            'Pedro' => 17,
            'Ana' => 22
            ];
        </code>
        <br>
        <?php
        $personas = [
            'Juan' => 15,
            'María' => 20,
            'Pedro' => 17,
            'Ana' => 22
        ];
        foreach ($personas as $persona => $mayores) {
            if ($mayores >= 18) {
                echo $persona . " / ";
            }
        }
        ?>


        <hr>
        <h4>6: Combinación de arrays</h4>
        <p>
            Dado dos arrays de igual longitud, combina sus valores en un array asociativo donde los elementos del primer array son las claves y los del segundo array son los valores. <br>
        </p>
        <code>
            $claves = ['nombre', 'edad', 'ciudad'];<br>
            $valores = ['Juan', 25, 'Madrid'];
        </code>
        <?php
        $claves = ['nombre', 'edad', 'ciudad'];
        $valores = ['Juan', 25, 'Madrid'];
        $conbinar = array_combine($claves, $valores);
        ?>
        <input type="text" name="text" value="<?= print_r($conbinar); ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>7: Eliminar duplicados</h4>
        <p> Dado un array de números, elimina los valores duplicados y almacénalos en un nuevo array.</p>
        <code>$numeros = [1, 2, 2, 3, 4, 4, 5];</code>
        <?php

        $numeros = [1, 2, 2, 3, 4, 4, 5];
        $eliminarDuplicados = array_unique($numeros);

        ?>
        <input type="text" name="text" value="<?= print_r($eliminarDuplicados); ?>" aria-label="Read-only input" readonly />


        <hr>
        <h4>8: Multiplicar valores</h4>
        <p>
            Dado un array de números, multiplica cada valor por 2 y almacena los resultados en un nuevo array.
        </p>
        <code>$numeros = [1, 2, 3, 4, 5];</code>
        <?php

        //Observación de GPT: Inicializar $nuevoArrays antes del foreach para evitar errores.
        $numeross = [1, 2, 3, 4, 5];
        $nuevoArrays = [];
        foreach ($numeross as $numero) {
            $nuevoArrays[] = $numero * 2;
        }
        ?>

        <input type="text" name="text" value="<?= print_r($nuevoArrays); ?>" aria-label="Read-only input" readonly />

    </main>
</body>

</html>