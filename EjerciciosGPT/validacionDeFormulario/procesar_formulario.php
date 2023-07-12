<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos enviados
    $errors = [];
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validar el nombre
    if (empty($nombre)) {
        $errors[] = 'El campo Nombre es requerido';
    }

    // Validar el email
    if (empty($email)) {
        $errors[] = 'El campo Email es requerido';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El email proporcionado no es válido';
    }

    // Si no hay errores, procesar los datos
    if (empty($errors)) {
        // Aquí puedes realizar cualquier acción con los datos, como guardarlos en una base de datos o enviar un correo electrónico

        // Mostrar los datos enviados
        echo "<h2>Datos del formulario recibidos:</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Email: $email</p>";
    } else {
        // Mostrar los errores
        echo "<h2>Errores en el formulario:</h2>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
} else {
    // Redireccionar al formulario si se accede directamente a este archivo sin enviar el formulario
    header('Location: index.html');
    exit;
}
