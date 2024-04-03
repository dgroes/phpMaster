<?php

require_once '../includes/funciones.php';
require_once '../includes/conexion.php';

// Obtener los eventos
$eventos = conseguirEventos($db);

// Array para almacenar los eventos en formato JSON
$eventos_json = array();

// Convertir los eventos a formato JSON
while ($evento = mysqli_fetch_assoc($eventos)) {
    $eventos_json[] = array(
        'id' => $evento['id'],
        'title' => $evento['titulo'],
        'descripcion' => $evento['descripcion'],
        // 'datetime' => $evento['datetime'],
        'date' => $evento['fecha'],
        'time' => $evento['hora'],
        'location' => $evento['ubicacion'],
        'organizer' => $evento['organizador']
    );
}

// Establecer el tipo de contenido como JSON
header('Content-Type: application/json');

// Enviar los eventos como JSON al cliente
echo json_encode($eventos_json); // Corregido el envío de $eventos_json en lugar de $eventos
