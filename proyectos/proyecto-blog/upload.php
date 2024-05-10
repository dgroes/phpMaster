<?php
if (isset($_POST)) {
    require_once 'config/conexion.php';

    //Iniciar Sesión
    if (!isset($_SESSION)) {
        session_start();
    }

    /* Recoger los valres del formulario */
    /* Con el operador ternario se define si existe, ejmplo: Si $_post['nombre'] está definido (es decir, si existe y no es null), entonces $nombre toma el valor de $_post['nombre']. Si no está definido. $nombre se establece en false */
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    /* ARRAY DE ERRORES */
    $errores = array();
    /* Almacenar los errores en un array, manejando así los errores de mejor manera para el usuario. */

    /* Validar Nombre */
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    //Validar Email
    //La constante FILTER_VALIDATE_EMAIL comprueba si la variable posee estar de una dirección de correo eltectronico valido.
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    //Validar Contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía.";
    }

    // Procesar la foto de perfil
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Obtener información sobre el archivo
        $image_info = getimagesize($_FILES['foto']['tmp_name']);

        // Verificar si el archivo es una imagen
        if ($image_info !== false) {
            // El archivo es una imagen, puedes continuar con el procesamiento
            // Ruta donde se almacenará la foto
            $upload_directory = 'images/users/';

            // Obtener el nombre y la extensión del archivo
            $filename = $_FILES['foto']['name'];
            $tmp_name = $_FILES['foto']['tmp_name'];
            $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            // Generar un nombre único para el archivo
            $unique_filename = uniqid('profile_') . '.' . $file_extension;

            // Mover el archivo al directorio de destino
            if (move_uploaded_file($tmp_name, $upload_directory . $unique_filename)) {
                // La foto se cargó exitosamente, ahora puedes almacenar la ruta en la base de datos
                $foto = $upload_directory . $unique_filename;
            } else {
                // Ocurrió un error al mover el archivo
                $errores['foto'] = "Error al cargar la foto de perfil.";
            }
        } else {
            // El archivo no es una imagen
            $errores['foto'] = "El archivo seleccionado no es una imagen válida.";
        }
    } else {
        // El usuario no seleccionó ningún archivo o ocurrió un error al subirlo
        $errores['foto'] = "Debe seleccionar una imagen de perfil.";
    }



    //Guardar Usuario en la BD.
    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        //Cifrar la Contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        //Preparar la consulta SQL con marcadores de posición
        $sql = "INSERT INTO usuario (nombre, correo, password, foto, fecha_creacion) VALUES (?, ?, ?, ?, CURDATE())";

        //Preparar la declaración
        $stmt = mysqli_prepare($db, $sql);

        if ($stmt) {
            //Asociar parámetros
            mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $password_segura, $foto);

            //Ejecutar la declaración
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $_SESSION['completado'] = "El Registro se ha completado con éxito.";
            } else {
                $_SESSION['errores']['general'] = "Fallo al guardar el usuario.";
            }

            //Cerrar la declaración
            mysqli_stmt_close($stmt);
        } else {
            //Si la preparación de la consulta falla
            $_SESSION['errores']['general'] = "Error al preparar la consulta SQL.";
        }
    } else {
        $_SESSION['errores'] = $errores;
        header('Location: login.php');
    }
}
header('Location:login.php');
