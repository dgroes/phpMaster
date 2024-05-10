<?php
include "config/db.php";

$sentence = $conection->prepare("SELECT * FROM visitas ORDER BY fecha DESC");
$sentence->execute();
$result = $sentence->setFetchmode(PDO::FETCH_ASSOC);
$date = $sentence->fetchAll();


if ($_POST) {
    //Antes de hacer el insert completo en Visita, se deberán tener los datos de las tabla relacionadas a este para que funcione como se debe.

    //1. Persona - primero se deberán capturar los datos de persona.
    $nombre = $_POST['nombre'];
    $run = $_POST['run'];
    $sentencePersona = $conection->prepare("INSERT INTO persona (id, nombre) VALUES (:id, :nombre)");
    $sentencePersona->bindParam(':id', $run);  // Aquí se asume que 'run' es la columna 'id' de tu tabla
    $sentencePersona->bindParam(':nombre', $nombre);
    $sentencePersona->execute();


    //2. Vehículo - luego es el mismo proceso que pasa persona en esta parte.
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $sentenceVehiculo = $conection->prepare("INSERT INTO vehiculo (id, marca) VALUES (:id, :marca)");
    $sentenceVehiculo->bindParam(':id', $matricula);
    $sentenceVehiculo->bindParam(':marca', $marca);
    $sentenceVehiculo->execute();

    //3. Luego el resto de datos que están enfocados 100% en la tabla visita.
    $depto = $_POST['depto'];
    $fecha = $_POST['fecha'];
    $hora_llegada = $_POST['hora_llegada'];
    $parentesco = $_POST['parentesco'];

    //3.1 Antes de comenzar con el insert se deberán obener los id de las tablas relacionadas a visita.
    $id_persona = $run;
    $id_vehiculo = $matricula;
    $sentenceVisita = $conection->prepare("INSERT INTO visita (id, id_persona, id_vehiculo, depto, fecha, hora_llegada, parentesco) VALUES (NULL, :id_persona, :id_vehiculo, :depto, :fecha, :hora_llegada, :parentesco)");
    $sentenceVisita->bindParam(':id_persona', $run);
    $sentenceVisita->bindParam(':id_vehiculo', $matricula);
    $sentenceVisita->bindParam(':depto', $depto);
    $sentenceVisita->bindParam(':fecha', $fecha);
    $sentenceVisita->bindParam(':hora_llegada', $hora_llegada);
    $sentenceVisita->bindParam(':parentesco', $parentesco);
    $sentenceVisita->execute();

    header("Location:?"); /*Evitar que se agregen registros de manera automatica cuando la pagina se actualiza */
}


// DELETE
// DELETE
if ($_GET && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty($id)) {
        $sentenceBorrar = $conection->prepare("DELETE FROM visita WHERE id = :id");
        $sentenceBorrar->bindParam(':id', $id);
        $result = $sentenceBorrar->execute();

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Error al intentar eliminar el registro.";
        }
    } else {
        echo "ID no válido.";
    }
} else {
    echo "ID no especificado.";
}
