<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Tranversal</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

    <section class="container">
        <article>
            <h2>Procesos</h2>
            <a href="#">Agregar</a>
            <a href="#">Listar</a>
        </article>
        <article class="form-container">
            <form action="" method="post">

                <label for="codigo">Codigo:</label>
                <input type="number" name="codigo" id="codigo" required maxlength="4">

                <label for="num_motor">Numero Motor:</label>
                <input type="text" name="num_motor" id="num_motor" required maxlength="11">

                <label for="tipo_veh">Tipo Vehículo:</label>
                <input type="text" name="tipo_veh" id="tipo_veh" required maxlength="15">

                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" required maxlength="1">

                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" required maxlength="20">

                <label for="anno">Año:</label>
                <input type="number" name="anno" id="anno" maxlength="4">

                <label for="color">Color:</label>
                <input type="text" name="color" id="color" maxlength="15">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" maxlength="8">

                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" maxlength="1">

                <label for="revision">Revisión:</label>
                <input type="text" name="revision" id="revision" maxlength="1">

                <input type="submit" value="Agregar">
            </form>
        </article>
    </section>

</body>

</html>