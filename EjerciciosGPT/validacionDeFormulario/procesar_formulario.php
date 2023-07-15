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
				//Este elseif se utiliza para validar el campo de email en el formulario. Veamos cómo funciona:
				/* En esta parte del código, se utiliza la función filter_var() de PHP para validar si el valor del campo email cumple con el formato de una dirección de correo electrónico válida.*/
				/*La función filter_var() toma dos argumentos: el valor que se desea validar y el filtro que se aplicará. En este caso, el valor es $email, que es el valor ingresado por el usuario en el campo de email del formulario.
				El filtro utilizado es FILTER_VALIDATE_EMAIL, que es una constante predefinida en PHP para validar direcciones de correo electrónico.
				Si filter_var() devuelve false, significa que el valor proporcionado en el campo de email no es válido según el formato de una dirección de correo electrónico. En ese caso, se agrega un mensaje de error al array $errors[], indicando que el email proporcionado no es válido.
				De esta manera, se verifica que el campo de email tenga un formato válido antes de continuar con el procesamiento de los datos.
				Es importante realizar esta validación para asegurarse de que los datos ingresados cumplan con los requisitos esperados y evitar posibles problemas al utilizarlos posteriormente.
				*/
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