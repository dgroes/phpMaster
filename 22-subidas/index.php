<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de archivos</title>
</head>
<body>
    <h1>Subir archivos en PHP</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <input type="submit" value="enviar">
    </form>
    

    <h2>Listado de imagenes</h2>
    <?php

        $gestor = opendir('./images');
        if($gestor):
            while (($image = readdir($gestor)) !== false):
                if($image != '.' && $image != '..'):
                    echo "<img src='images/$image' width='200px'><br>";
                endif;
            endwhile;
        endif;

    ?>
    
</body>
</html>