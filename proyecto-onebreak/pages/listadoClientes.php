<article>
    <h3>Listado de clientes</h3>
    <p>Contenido de la página de listado de clientes...</p>
    <div id="filtro">
        <label for="filtroRut">Filtrar por Rut:</label>
        <input type="text" id="filtroRut" oninput="filtrarClientes()">

        <label for="filtroTipo">Filtrar por Tipo de Empresa:</label>
        <input type="text" id="filtroTipo" oninput="filtrarClientes()">

        <label for="filtroActividad">Filtrar por Actividad:</label>
        <input type="text" id="filtroActividad" oninput="filtrarClientes()">
    </div>

    <table id="tablaClientes">
        <thead>
            <tr>
                <th>Run</th>
                <th>Razón Social</th>
                <th>Nombre de Contacto</th>
                <th>Email de Contacto</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Actividad</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>199146432</td>
                <td>Administración Juridica</td>
                <td>Diego Pastén</td>
                <td>diegopp@gmail.com</td>
                <td>Carirriñe #15205</td>
                <td>56930608649</td>
                <td>Bloque</td>
                <td>Rojo</td>
            </tr>
            <tr>
                <td>876543210</td>
                <td>Comercio Internacional S.A.</td>
                <td>Marta Pérez</td>
                <td>marta@example.com</td>
                <td>Avenida Principal #123</td>
                <td>555-7890</td>
                <td>Comercio</td>
                <td>Azul</td>
            </tr>
            <tr>
                <td>123456789</td>
                <td>Ferretería López Ltda.</td>
                <td>Javier López</td>
                <td>javier@example.com</td>
                <td>Calle de las Herramientas #456</td>
                <td>555-1234</td>
                <td>Ferretería</td>
                <td>Verde</td>
            </tr>

            <tr>
                <td>987654321</td>
                <td>Electrodomésticos S.A.</td>
                <td>Laura González</td>
                <td>laura@example.com</td>
                <td>Plaza de la Tecnología #789</td>
                <td>555-5678</td>
                <td>Electrónica</td>
                <td>Amarillo</td>
            </tr>

            <tr>
                <td>345678901</td>
                <td>Papelería Creativa E.I.R.L.</td>
                <td>Carlos Rodríguez</td>
                <td>carlos@example.com</td>
                <td>Avenida de los Libros #234</td>
                <td>555-4321</td>
                <td>Papelería</td>
                <td>Rosa</td>
            </tr>

        </tbody>
    </table>
</article>
<script>
    function filtrarClientes() {
        var filtroRut = document.getElementById('filtroRut').value;
        var filtroTipo = document.getElementById('filtroTipo').value;
        var filtroActividad = document.getElementById('filtroActividad').value;

        // Enviar solicitud AJAX al servidor
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Actualizar la tabla con los resultados del servidor
                document.getElementById('tablaClientes').innerHTML = xhr.responseText;
            }
        };

        // Construir la URL con los parámetros de filtrado
        var url = 'filtrar_clientes.php?rut=' + filtroRut + '&tipo=' + filtroTipo + '&actividad=' + filtroActividad;
        xhr.open('GET', url, true);
        xhr.send();
    }
</script>