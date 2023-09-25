<?php
include('db.php');

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Utiliza comillas simples alrededor de los valores de cadena
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    
    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("Error en la consulta");
    }
    $_SESSION['message'] = 'Task Saved Succesfully';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}

?>