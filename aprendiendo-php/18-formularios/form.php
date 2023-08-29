<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
    <header>
        <h1>Formulario</h1>
    </header>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombres" id="" autofocus placeholder="Nombre">

        
        <label for="boton">Botón</label>
        <p><input type="button" name="boton" id="" value="Cliclame"></p>

        <label for="sexo">Sexo</label>
        <p>
           Mujer: <input type="checkbox" name="sexo" id="" value="Mujer">
           Hombre:<input type="checkbox" name="sexo" id="" value="Nombre" checked>
        </p>

        <label for="color">Color</label>
        <p><input type="color" name="color" id=""></p>

        <label for="fecha">Fecha</label>
        <p><input type="date" name="fecha" id=""></p>

        <label for="correo">Correo</label>
        <p><input type="email" name="correo" id=""></p>

        <label for="archivo">Archivo</label>
        <p><input type="file" name="archivo" id=""></p>

        <label for="numero">Numero</label>
        <p><input type="number" name="numero" id=""></p>

        <label for="contrasena">Contraseña</label>
        <p><input type="password" name="contrasena" id=""></p>

        <label for="continente">Continente</label>
        <p>
        North America: <input type="radio" name="continente" id="" value="North America">
        South America: <input type="radio" name="continente" id="" value="South America">
        Asia: <input type="radio" name="continente" id="" value="Asia">
        </p>

        <label for="WEB">pAGINA</label>
        <p><input type="url" name="WEB" id=""></p>

        <label for="area">Area de texto</label>
        <p><textarea name="area" id="" cols="30" rows="10"></textarea></p>

        <label for="select">Select</label>
        <p>
            <select name="select" id="">
                <option value="GTA">GTA</option>
                <option value="Dark">Dark Souls</option>
                <option value="Bloodborne">Bloodborne</option>
                <option value="Doom">Doom</option>
                <option value="Terraria">Terraria</option>
                <option value="Portal">Portal</option>
                <option value="Bully">Bully</option>

            </select>
        </p>
        
        


        <input type="submit" value="Enviar">
    </form>
</body>
</html>