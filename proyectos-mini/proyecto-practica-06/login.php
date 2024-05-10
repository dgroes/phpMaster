<?php require_once 'includes/header.php' ?>

<form class="register" method="POST" action="controllers/loginController.php">
    <h2>Iniciar Sesión</h2>
    <div class="input-group">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" id="nombre">

    </div>

    <div class="input-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">

    </div>

    <button type="submit">Iniciar</button>
</form>