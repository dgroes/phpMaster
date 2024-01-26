<article>
    <h3>Administración de clientes</h3>
    <p>Contenido de la página de administración de clientes...</p>
    <form action="actions/clientes_actions.php" method="POST">
        <div class="form-bloque-izquierda">
            <label for="rut">Rut</label>
            <input type="text" name="rut">

            <label for="razonSocial">Razón Social</label>
            <input type="text" name="razonSocial">

            <label for="nombreContacto">Nombre de Contacto</label>
            <input type="text" name="nombreContacto">

            <label for="mailContacto">Mail de Contacto</label>
            <input type="email" name="mailContacto">

            <label for="direccion">Dirección</label>
            <input type="text" name="direccion">

            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono">

            <label for="actividad">Actividad</label>
            <select name="actividad">
                <?php
                $actividades = getActividadEmpresa($conn);
                if (!empty($actividades)) :
                    while ($actividad = mysqli_fetch_assoc($actividades)) :
                ?>
                        <option value="<?= $actividad['id'] ?>">
                            <?= $actividad['detalle'] ?>
                        </option>
                <?php
                    endwhile;
                endif;
                ?>
            </select>

            <label for="tipo">Tipo</label>
            <select name="tipo">
                <?php
                $empresas = getTipoEmpresa($conn);
                if (!empty($empresas)) :
                    while ($tipo = mysqli_fetch_assoc($empresas)) :
                ?>
                        <option value="<?= $tipo['id'] ?>">
                            <?= $tipo['detalle'] ?>
                        </option>
                <?php
                    endwhile;
                endif;
                ?>
            </select>
            <button type="submit">Guardar</button>
            
        </div>
        <div class="form-bloque-derecha">
            <label for="buscar-run">Buscar por Run</label>
            <input type="text" name="buscar-run" id="">
            <button type="submit">Buscar</button>

            <button type="button">Borrar</button>
            <button type="button">Mostrar Lista</button>
        </div>
    </form>
</article>