<article>
    <h3>Listado de contratos</h3>
    <p>Contenido de la página de listado de contratos...</p>
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
                <th>Numero de Contrato</th>
                <th>Creación</th>
                <th>Termino</th>
                <th>Fecha y Hora de Inicio</th>
                <th>Fecha y Hora de Término</th>
                <th>Dirección</th>
                <th>Estado de Vigencia</th>
                <th>Tipo</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>CT2022001</td>
            <td>2022-01-01</td>
            <td>2022-12-31</td>
            <td>2022-01-01 08:00:00</td>
            <td>2022-12-31 17:00:00</td>
            <td>Avenida Principal #123</td>
            <td>Vigente</td>
            <td>Contrato de Servicio</td>
            <td>Contrato anual para servicios de mantenimiento</td>
        </tr>
        <tr>
            <td>CT2022002</td>
            <td>2022-02-15</td>
            <td>2022-08-15</td>
            <td>2022-02-15 10:30:00</td>
            <td>2022-08-15 18:30:00</td>
            <td>Calle Secundaria #456</td>
            <td>Expirado</td>
            <td>Contrato de Venta</td>
            <td>Venta de productos electrónicos</td>
        </tr>
        </tbody>
    </table>
</article>
