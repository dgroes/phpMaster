    <form action="controller/guardar-registro.php" method="post">

        <!-- BLOQUE IZQUIERDO DEL FORMULARIO -->
        <div class="bloque-izquierda">

            <!-- CAMPO CÓDIGO -->
            <label for="codigo">Código:</label>
            <input type="number" name="codigo" id="codigo" min="1" max="9999" placeholder="Código de registro" class="placeholder-color" oninput="limitarDigitos(this, 4)">

            <!-- NÚMERO MOTOR -->
            <label for="num_motor">
                Número del Motor <span class="pop" title="Los números de motores siguen un estándar que generalmente incluye una combinación de letras y números. Ejemplos: A123B567CD89 / M987XY234NQ01 / T456PL789JK23">?</span>:
            </label>
            <input type="text" name="num_motor" id="num_motor" required maxlength="11" minlength="11" placeholder="Número del Motor" class="placeholder-color">

            <!-- TIPO DE VEHÍCULO -->
            <label for="tipo_vehiculo">Tipo de Vehículo:</label>
            <select name="tipo_vehiculo" id="tipo_vehiculo" required>
                <option value="" disabled selected>Seleccionar Tipo de Vehículo</option>
                <option value="Auto" title="Auto">Auto</option>
                <option value="Station Vagon" title="Station Vagon">Station Vagon</option>
                <option value="Camioneta" title="Camioneta">Camioneta</option>
            </select>

            <!-- MARCA -->
            <label for="marca">Marca</label>
            <select name="marca" id="marca" required>
                <option value="" disabled selected>Seleccionar Marca</option>
                <option value="H" title="Hyundai">Hyundai</option>
                <option value="C" title="Chevrolet">Chevrolet</option>
                <option value="M" title="Mitsubishi">Mitsubishi</option>
                <option value="R" title="Renault">Renault</option>
                <option value="T" title="Toyota">Toyota</option>
            </select>

            <!-- MODELO -->
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required maxlength="20" minlength="2" placeholder="Modelo del Vehículo" class="placeholder-color">

        </div>

        <!-- BLOQUE DERECHO DEL FORMULARIO -->
        <div class="bloque-derecha">

            <!-- AÑO -->
            <label for="anno">Año:</label>
            <input type="number" name="anno" id="anno" placeholder="Año del Vehículo" oninput="limitarDigitos(this, 4)">



            <!-- COLOR -->
            <label for="color">Color</label>
            <select name="color" id="color" required>
                <option value="" disabled selected>Seleccionar Color</option>
                <option value="Rojo" title="Rojo">Rojo</option>
                <option value="Negro" title="Negro">Negro</option>
                <option value="Blanco" title="Blanco">Blanco</option>
                <option value="Gris" title="Gris">Gris</option>
            </select>

            <!-- PRECIO -->
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" min="1000000" max="50000000" placeholder="1.000.000" class="placeholder-color" oninput="validarPrecio(this)">


            <!-- ESTADO -->
            <label for="estado">
                Estado <span class="pop" title="Representa la condición general del vehículo en términos de si es nuevo o usado.">?</span>:
            </label>
            <select name="estado" id="estado" required>
                <option value="" disabled selected>Seleccionar Estado</option>
                <option value="N" title="Nuevo">Nuevo</option>
                <option value="U" title="Usado">Usado</option>
            </select>

            <!-- REVISIÓN -->
            <label for="revision">
                Revisión Técnica <span class="pop" title="Representa si el vehículo ha pasado o no una revisión técnica.">?</span>:
            </label>
            <select name="revision" id="revision" required>
                <option value="" disabled selected>Seleccionar Revisión</option>
                <option value="1">Nuevo</option>
                <option value="0">Usado</option>
            </select>
        </div>

        <!-- BOTÓN AGREGAR -->
        <input type="submit" value="Agregar" id="boton">

    </form>

    </article>