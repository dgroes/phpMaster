<?php require_once 'includes/header.php' ?>

<form class="register" method="POST" action="controllers/registerController.php">
    <h2>Registrarse</h2>
    <div class="input-group">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="nombre" id="nombre">

    </div>
    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email"  name="email">

    </div>
    <div class="input-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

    </div>
    
    <button type="submit">Registrar</button>
</form>