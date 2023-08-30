<aside id="sidebar">
    <div id="login" class="bloque">
        <h3>Identificate</h3>
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Entrar">
        </form>
    </div>

    <div id="register" class="bloque">
        <h3>Registrate</h3>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" name="submit" value="Registrar">
        </form>
    </div>
</aside>