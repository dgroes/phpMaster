<?php
if (isset($_POST)) {
    require_once '../config/conexion.php';
    //Si $_POST['codigo'] está definido (es verdadera), se utiliza 'mysqli_real_escape_string($db, $_POST['codigo'])' para escapar y asegurar el valor del parámetro 'codigo'. Esto se hace para prevenir inyecciones SQL y otros ataques. Si $_POST['codigo'] no está definido (la condición isset($_POST['codigo']) es falsa), se asignará false a la variable $codigo.

    $codigo = isset($_POST['codigo']) ? intval($_POST['codigo']) : null;
    $num_motor = isset($_POST['num_motor']) ? mysqli_real_escape_string($db, $_POST['num_motor']) : false;
    $tipo_vehiculo = isset($_POST['tipo_vehiculo']) ? mysqli_real_escape_string($db, $_POST['tipo_vehiculo']) : false;
    $marca = isset($_POST['marca']) ? mysqli_real_escape_string($db, $_POST['marca']) : false;
    $modelo = isset($_POST['modelo']) ? mysqli_real_escape_string($db, $_POST['modelo']) : false;
    $anno = isset($_POST['anno']) ? intval($_POST['anno']) : null;
    $color = isset($_POST['color']) ? mysqli_real_escape_string($db, $_POST['color']) : false;
    $precio = isset($_POST['precio']) ? intval($_POST['precio']) : null;
    $estado = isset($_POST['estado']) ? mysqli_real_escape_string($db, $_POST['estado']) : false;
    $revision = isset($_POST['revision']) ? intval($_POST['revision']) : null;

    // VALIDACIÓN DE ERRORES
    $errores = array();

    if (!is_numeric($codigo)) {
        $errores['codigo'] = 'El código no es un número válido';
    }

    if (empty($num_motor)) {
        $errores['num_motor'] = 'El motor no es válido';
    }

    if (empty($tipo_vehiculo)) {
        $errores['tipo_vehiculo'] = 'El tipo de vehículo no es válido';
    }

    if (empty($marca)) {
        $errores['marca'] = 'La marca del vehículo no es válida';
    }

    if (empty($modelo)) {
        $errores['modelo'] = 'El modelo del vehículo no es válido';
    }

    if (!is_numeric($anno)) {
        $errores['anno'] = 'El año del vehículo no es válido';
    }

    if (empty($color)) {
        $errores['color'] = 'El color de vehículo no es válido';
    }

    if (!is_numeric($precio)) {
        $errores['precio'] = 'El precio del vehículo no es válido';
    }

    if (empty($estado)) {
        $errores['estado'] = 'El estado del vehículo no es válido';
    }

    if (!is_numeric($revision)) {
        $errores['revision'] = 'La revisión del vehículo no es válida';
    }

    // Verificación si hay errores antes de la inserción.
    if (empty($errores)) {
        // Preparar la consulta SQL con parámetros seguros.
        /* En esta línea, estás creando una cadena SQL que representa una instrucción de inserción (INSERT INTO) en la tabla vehiculo. En lugar de incluir directamente los valores, utilizas marcadores de posición ? para representar los valores que se proporcionarán más adelante. Esto es parte de la técnica llamada "sentencias preparadas" que ayuda a prevenir ataques de inyección SQL. */
        $sql = "INSERT INTO vehiculo VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la sentencia.
        /* Aquí, estás utilizando la función mysqli_prepare() para preparar la sentencia SQL para su ejecución. Esta función toma dos argumentos: la conexión a la base de datos ($db) y la cadena SQL preparada ($sql). La sentencia preparada es un tipo especial de consulta SQL que se almacena en el servidor de la base de datos y puede ser ejecutada varias veces con diferentes conjuntos de datos. La variable $stmt ahora contiene la sentencia preparada que estás a punto de ejecutar. */
        $stmt = mysqli_prepare($db, $sql);
        /* La abreviatura "stmt" en el contexto de la programación en PHP y MySQL generalmente se refiere a una "sentencia preparada" o "prepared statement". Una sentencia preparada es una forma de ejecutar consultas SQL de manera segura al permitir la separación de la instrucción SQL de los datos proporcionados, evitando así problemas de seguridad como la inyección SQL.*/

        // Vincular los parámetros.
        /* mysqli_stmt_bind_param: Esta función se utiliza para vincular variables a una sentencia preparada antes de ejecutarla. Asegura que los valores se inserten de manera segura en la consulta y ayuda a prevenir la inyección de SQL. */
        /* $stmt: La primera variable que toma mysqli_stmt_bind_param es la sentencia preparada a la cual deseas vincular los parámetros. */
       /* "issisissis": Esta cadena define el tipo de datos de cada parámetro. En este caso: "i" significa entero. / "s" significa cadena (string). La secuencia de tipos se corresponde con la secuencia de variables que se pasan a continuación. */
        mysqli_stmt_bind_param($stmt, "issisissii", $codigo, $num_motor, $tipo_vehiculo, $marca, $modelo, $anno, $color, $precio, $estado, $revision);

        // Ejecutar la sentencia.
        /* mysqli_stmt_execute: Esta función forma parte de la extensión MySQLi (MySQL Improved) en PHP y se utiliza específicamente para ejecutar una sentencia preparada. La abreviatura "stmt" se refiere a "statement" (sentencia). */
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro insertado con éxito.";
        } else {
            /* mysqli_error($db) se utiliza para obtener el mensaje de error de la última operación MySQL que se ha llevado a cabo en la conexión proporcionada ($db en este caso). */
            echo "Error al insertar el registro: " . mysqli_error($db);
        }

        // Cerrar la sentencia.
        mysqli_stmt_close($stmt);
    } else {
        // Manejar los errores, por ejemplo, imprimirlos.
        print_r($errores);
    }
}
