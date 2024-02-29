<?php require_once 'templates/header.php' ?>


<form class="register" method="POST" action="controllers/loginController.php">
    <h2>Iniciar Sesión</h2>
    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div class="input-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena">
    </div>



    <button type="submit">Iniciar</button>
</form>