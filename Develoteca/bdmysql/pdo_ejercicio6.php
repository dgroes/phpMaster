<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "pdodeveloteca";

try {
    $connection = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Established..." . "<br>";

    $connection->beginTransaction();
    
    $sql = "INSERT INTO students (id, name, email) VALUES (NULL, 'Dalpo', 'dalpo@gmail.com');";
    $sql .= "INSERT INTO students (id, name, email) VALUES (NULL, 'Suki', 'suki32@gmail.com');";
    $sql .= "INSERT INTO students (id, name, email) VALUES (NULL, 'Momo', 'i_love_basura@gmail.com');";

    $connection->exec($sql);
    $connection->commit();

    echo "Datos insertados...";
} catch (PDOException $error) {
    $connection->rollBack();
    echo "ERROR: " . $error->getMessage();
}
/* 
$connection->beginTransaction();

Esta línea inicia una transacción en la base de datos.
La transacción agrupa todas las operaciones de base de datos que se realizan a continuación hasta que se confirme o se revierta.
Si hay algún error durante las operaciones de la transacción, puedes revertir todas las operaciones y dejar la base de datos en un estado consistente.
Operaciones de inserción:

Entre beginTransaction() y commit(), se realizan las operaciones de inserción en la base de datos.
$connection->commit();

Después de que todas las operaciones de la transacción se han ejecutado correctamente, se llama a commit() para confirmar los cambios en la base de datos.
Si no hay errores, todos los cambios realizados dentro de la transacción se aplicarán permanentemente a la base de datos.
Manejo de errores:

Si ocurre algún error durante las operaciones de la transacción, se puede llamar a $connection->rollBack(); en lugar de commit(). Esto revertirá todas las operaciones realizadas desde el inicio de la transacción y dejará la base de datos en su estado original.
El uso de transacciones es útil para garantizar la integridad de los datos, especialmente cuando se realizan múltiples operaciones de base de datos que deben ser coherentes entre sí. Si ocurre algún error durante la transacción, puedes revertir todos los cambios y evitar dejar la base de datos en un estado inconsistente.

*/