<?php
require_once 'config/conexion.php';
require_once 'includes/header.php';
require_once 'helpers.php';

/* INICIALIZAR VARIABLES DE ERRORES */
$errores = array();



?>

<article class="login">

    <h1>Registrarse</h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">

        <div class=" formulario_bloque">
            <input type="text" name="nombre" placeholder="Nombre de usuario">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
        </div>

        <div class="formulario_bloque">
            <input type="email" name="email" placeholder="Correo">
        </div>

        <div class="formulario_bloque">
            <input type="file" id="foto" name="foto" accept="image/*" placeholder="Foto de perfil">
        </div>


        <div class="formulario_bloque">
            <input type="password" name="password" placeholder="Contraseña">
        </div>

        <input class="boton-enviar" type="submit" value="Registrar">

        <div class="registrarse">
            Ya tengo una cuenta <a href="login.php">Iniciar</a>
        </div>

    </form>
    <?php borrarErrores(); ?>

</article>


<?php require_once 'includes/footer.php'; ?>