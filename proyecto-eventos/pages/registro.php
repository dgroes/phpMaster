<?php require_once 'templates/header.php' ?>

<form class="register" method="POST" action="controllers/registerController.php">
    <h2>Registrase</h2>
    <div class="input-group">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" id="nombre">
    </div>

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