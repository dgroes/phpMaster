<?php
// Verificar si se envió el formulario
if (isset($_GET['name'])) {
    // Obtener el nombre del Pokémon del formulario
    $pokemon_name = $_GET['name'];

    // Construir la URL de la API usando el nombre del Pokémon
    $api_url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemon_name);

    // Inicializar una nueva sesión de cURL
    $ch = curl_init($api_url);
    // Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ejecutar la petición y guardar el resultado
    $result = curl_exec($ch);
    // Decodificar el JSON
    $data = json_decode($result, true);
    // Cerrar la sesión cURL
    curl_close($ch);
} else {
    // Si no se envió el formulario o no se especificó el nombre del Pokémon, usa los datos predeterminados
    $api_url = "https://pokeapi.co/api/v2/pokemon/ditto";
    // Inicializar una nueva sesión de cURL
    $ch = curl_init($api_url);
    // Indicar que queremos recibir el resultado de la petición y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ejecutar la petición y guardar el resultado
    $result = curl_exec($ch);
    // Decodificar el JSON
    $data = json_decode($result, true);
    // Cerrar la sesión cURL
    curl_close($ch);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeAPI</title>

    <!-- _CDN DE PICO CSS_ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <article>
        <form action="index.php">
            <label for="name">Pokemon</label>
            <input type="text" name="name" placeholder="Ejem: Ditto">
            <input type="submit" value="Buscar">
        </form>
    </article>
    <section>
    <?php if(isset($data['name'])) { ?>
        <h1 class="nombre"><?= $data['name'] ?></h1>
        <img class="imagen" src="<?= $data['sprites']['other']['official-artwork']['front_default'] ?>" alt="">
        <div class="tipo"><?= $data['types'][0]['type']['name']; ?></div>
    <?php } else { ?>
        <p>No se encontraron datos para el Pokémon especificado.</p>
    <?php } ?>
</section>


</body>

</html>

<style>

    body {
        margin-left: 20px;
        margin-right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    section {
        margin-left: 20px;
        margin-right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .nombre {
        font-size: 80px;
        text-transform: capitalize;
    }

    .imagen {
        width: 600px;
    }

    .tipo {
        font-size: 30px;
        text-transform: capitalize;
    }
</style>