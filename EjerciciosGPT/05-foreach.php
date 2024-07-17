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
        foreach($numeros as $pares){
            if($pares % 2 == 0){
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
            $toString = implode(", ", $palabras);
            $ichula = 'cereza';
            $repeticiones = substr_count(($toString), $ichula);
            echo $repeticiones;

            echo $toString;
           /*  foreach($palabras as $palabra){
                if($palabra == "manzana")
                count($palabra);
            } */
            
        ?>

    </main>
</body>

</html>