<?php
require_once 'config/conexion.php';
require_once 'includes/header.php'; ?>

<article class="login">

    <h1>Inicio de sesión</h1>

    <form action="inicio.php" method="POST">

        <div class="formulario_bloque">
            <input type="email" name="email" placeholder="Correo electronico">
        </div>

        <div class="formulario_bloque">
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <input class="boton-enviar" type="submit" value="Iniciar">

        <div class="recordar"><a href="">Olvidé mi contraseña</a></div>

        <div class="registrarse">
            Quiero registrarme <a href="register.php">Registrar</a>
        </div>

    </form>

</article>


<?php require_once 'includes/footer.php'; ?>