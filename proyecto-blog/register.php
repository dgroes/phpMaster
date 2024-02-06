<?php

require_once 'includes/header.php';

/* INICIALIZAR VARIABLES DE ERRORES */
$errores = array();

if($_SERVER["REQUES_METOD"]== "POST"){
    
}

?>

<article class="login">

    <h1>Registrarse</h1>

    <form action="login-formulario">

        <div class="formulario_bloque">
            <input type="text" name="nombre" placeholder="Nombre de usuario">
        </div>

        <div class="formulario_bloque">
            <input type="email" name="email" placeholder="Correo">
        </div>

        <div class="formulario_bloque">
            <input type="password" name="password" placeholder="Contraseña">
        </div>

        <input class="boton-enviar" type="submit" value="Registrar">

        <div class="registrarse">
            Ya tengo una cuenta <a href="login.php">Iniciar</a>
        </div>

    </form>

</article>


<?php require_once 'includes/footer.php'; ?>