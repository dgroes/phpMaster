<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Turnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- SECCIÓN DE CREAR Y LISTAR TRABAJADORES -->
    <h2>Trabajadores</h2>
    <section class="trabajador">
        <article>
            <form class="trabajador__crear">
                <fieldset>
                    <legend>Crear Trabajador</legend>

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido">

                    <label for="cargo">Cargo</label>
                    <select name="cargo">
                        <option selected disabled value="">
                            Seleccionar cargo
                        </option>
                        <option value="conserje">Conserje</option>
                        <option value="auxiliar">Auxiliar de Aseo</option>
                    </select>

                    <input type="submit" value="Guardar">

                </fieldset>
            </form>

        </article>

        <article class="trabajador__listar">
            <table>
                <legend>Listado de trabajadores</legend>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>3741255</td>
                        <td>Jones, Martha</td>
                        <td>Computer Science</td>
                        <td>240</td>
                    </tr>
                    <tr>
                        <td>3971244</td>
                        <td>Nim, Victor</td>
                        <td>Russian Literature</td>
                        <td>220</td>
                    </tr>
                    <tr>
                        <td>4100332</td>
                        <td>Petrov, Alexandra</td>
                        <td>Astrophysics</td>
                        <td>260</td>
                    </tr>
                </tbody>
            </table>


        </article>
    </section>

    <!-- SECCIÓN DE LISTAR Y CREAR TURNOS -->
    <h2>Turnos</h2>
    <section class="trabajador">
        <article>
            <form class="trabajador__crear">
                <fieldset>
                    <legend>Asignar turno</legend>

                    <label for="nombre">Tipo de turno</label>

                    <label for="nombre">Trabajador a cargo</label>

                    <label for="nombre">Hora de Ingreso</label>
                    <label for="nombre">Hora de Salida</label>

                    <label for="nombre">Nombre</label>


                    <input type="text" name="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido">
                    <label for="cargo">Cargo</label>
                    <select name="cargo">
                        <option selected disabled value="">
                            Seleccionar cargo
                        </option>
                        <option value="conserje">Conserje</option>
                        <option value="auxiliar">Auxiliar de Aseo</option>
                    </select>

                    <input type="submit" value="Guardar">

                </fieldset>
            </form>

        </article>

        <article>
            <form class="trabajador__crear">
                <fieldset>
                    <legend>Crear Truno</legend>

                    <label for="nombre">Nombre del tuno</label>

                    <label for="nombre">Dia de incio del turno</label>
                    <label for="nombre">Dia de termino del turno</label>

                    <label for="nombre">Hora de Ingreso</label>
                    <label for="nombre">Hora de Salida</label>

                    <label for="nombre">Detalle del turno</label>


                    <input type="text" name="nombre">

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido">
                    <label for="cargo">Cargo</label>
                    <select name="cargo">
                        <option selected disabled value="">
                            Seleccionar cargo
                        </option>
                        <option value="conserje">Conserje</option>
                        <option value="auxiliar">Auxiliar de Aseo</option>
                    </select>

                    <input type="submit" value="Guardar">

                </fieldset>
            </form>

        </article>

        <article class="trabajador__listar">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>3741255</td>
                        <td>Jones, Martha</td>
                        <td>Computer Science</td>
                        <td>240</td>
                    </tr>
                    <tr>
                        <td>3971244</td>
                        <td>Nim, Victor</td>
                        <td>Russian Literature</td>
                        <td>220</td>
                    </tr>
                    <tr>
                        <td>4100332</td>
                        <td>Petrov, Alexandra</td>
                        <td>Astrophysics</td>
                        <td>260</td>
                    </tr>
                </tbody>
            </table>


        </article>
    </section>

    <form action="/submit" method="post">
        <label for="fruits">Selecciona tus frutas favoritas:</label>
        <select name="fruits[]" id="fruits" multiple>
            <option value="apple">Manzana</option>
            <option value="banana">Banana</option>
            <option value="orange">Naranja</option>
            <option value="strawberry">Fresa</option>
            <option value="grape">Uva</option>
        </select>
        <button type="submit">Enviar</button>
    </form>


</body>

</html>